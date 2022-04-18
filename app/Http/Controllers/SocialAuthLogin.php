<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthLogin extends Controller
{
    //
    public function redirect($serv)
    {
        //
        return Socialite::driver($serv)->redirect();

    }

    public function callback($serv)
    {
        //

    //    $user = Socialite::with($serv)->user();
    //    dd($user);

    $githubUser = Socialite::driver($serv)->user();
    $user = User::updateOrCreate([
        'address' => $githubUser->id,
        // 'social_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'password' => bcrypt($githubUser->id),
        'premium' => 0,
        'verified' => 1,
        // 'github_token' => $githubUser->token,
        // 'github_refresh_token' => $githubUser->refreshToken,
    ]);
    Auth::login($user);
    return redirect('/');

    }
}
