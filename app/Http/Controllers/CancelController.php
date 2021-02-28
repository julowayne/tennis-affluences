<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;

class cancelController extends Controller
{
    public function cancelView($token)
    {
        return view('cancelConfirm', ['token' => $token]);
    }
    public function cancel(Request $request, $token)
    {
        $request->validate([
            'token' => $token
        ]);
        $data = DB::table('reservations')->select()->where('token', '=', $token)->get();
        // var_dump($data[0]->email);
        // die();
        $params = [
            'date' => $data[0]->date,
            'email' => $data[0]->email,
            'token' => $token
        ];
        $request->session()->flash('message', 'Votre réservation a bien été annulée !');
        Mail::send('emails.contact', $params, function ($m) use($params){
            $m->from($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
            $m->to($params['email'])->subject('Annulation de votre réservation');
        });
        DB::table('reservations')->where('token', '=', $token)->delete();
        return view('reservation', ['token' => $token]);
    }
}