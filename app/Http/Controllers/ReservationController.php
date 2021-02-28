<?php

namespace App\Http\Controllers;
use App\Http\Requests\formValidation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class reservationController extends Controller
{
    public function reservation()
    {
        return view('reservation');
    }
    public function confirmReservation(formValidation $request)
    {
        $params = [
            'date' => $request->get('date'),
            'email' => $request->get('email'),
            'token' => md5(uniqid(true))
        ];
        DB::table('reservations')->insert([
            'date' => $params['date'],
            'email' => $params['email'],
            'token' => $params['token']
        ]);
        Mail::send('emails.contact', $params, function ($m) use($params){
            $m->from($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
            $m->to($params['email'])->subject('Réservation de votre terrain');
        });
        $request->session()->flash('notification', 'Votre terrain a bien été réservé, vous allez recevoir un e-mail avec toutes les informations necessaires !');
        return view('welcome');    
    }
}
