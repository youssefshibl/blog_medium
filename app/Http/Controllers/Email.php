<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// add mail and order to send verify massage to user after
use Illuminate\Support\Facades\Mail;
use App\Mail\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Email extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->only(['verify_email','verify_email_check']);
    }

    public function verify_email()
    {
        // i commit this middleware beacuse access the verify of laravel
        $key = self::getName(20);
        $user = User::find(Auth::user()->id);
        $user->Verifiedes()->create(['verified_token' => $key]);
        Mail::to(Auth::user()->email)->send(new Order($key));
        return redirect()->route('home');
    }


    public function verify_email_check($key)
    {
        $user = User::with('Verifiedes')->find(Auth::user()->id);
        if($user->Verifiedes->verified_token == $key){
            $user->verified = 1;
            $user->save();

        }
        return redirect()->route('home');


    }

    static function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
