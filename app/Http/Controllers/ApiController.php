<?php

namespace App\Http\Controllers;

use App\Http\Requests\formValidation;
use App\Rules\cancelApiReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function get()
    {
        return Config::get('information');
        // $data = DB::table('reservations')->get();
        // return response($data, 200);
    }
    public function addReservation(formValidation $request)
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
        return response('la réservation a bien été prise en compte', 201);
    }
    public function deleteReservation(Request $request, $token)
    {
        $request->request->add(['token' => $token]);
        $request->validate([
            'token' => new cancelApiReservation
        ]);
        // $data = DB::table('reservations')->select()->where('token', '=', $token)->get();

        DB::table('reservations')->where('token', '=', $token)->delete();
        return response('', 204);
    }
}
