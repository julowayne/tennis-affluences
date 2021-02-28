<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class alreadyReserved implements Rule
{
    protected $date;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($dateValue)
    {
        $this->date= $dateValue;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        var_dump(DB::table('reservations')->select('email', 'date')->where('date', '=', $this->date)->where('email', '=', $value)->get());
        die();

        if(DB::table('reservations')->select('email', 'date')->where('date', '=', $this->date)->where('email', '=', $value)->get() == [])
            return true;
        else {
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Vous avez déjà reservé un terrain sur cet horaire.';
    }
}
