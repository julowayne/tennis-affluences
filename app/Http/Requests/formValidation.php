<?php

namespace App\Http\Requests;

use App\Rules\alreadyReserved;
use App\Rules\availableDates;
use App\Rules\forecastReservation;
use App\Rules\maxReservationSlot;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class formValidation extends FormRequest
{
    protected function failedValidation(Validator $validator) { 
        $isFailed = false;
        foreach($validator->failed() as $ruleValidate){
            if(array_key_exists("Email", $ruleValidate) OR array_key_exists("Required", $ruleValidate)){
                throw new HttpResponseException(
                    response()->json([
                      'status' => false,
                      'messages' => $validator->errors()->all(),
                    ], 422)
                  ); 
                $isFailed = true;
            }
        }
        if(!$isFailed){
            throw new HttpResponseException(
              response()->json([
                'status' => false,
                'messages' => $validator->errors()->all()              
            ], 400)
            ); 
        }
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', new alreadyReserved(request()->get('date'))],
            'date' => ['required', new forecastReservation, new maxReservationSlot, new availableDates],
            'cgu' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Veuillez entrer votre adresse email.',
            'date.required' => 'Veuillez choisir une date.',
            'cgu.required' => 'Vous devez accepter les conditions d\utilisation pour pouvoir réserver.',
        ];
    }
}
