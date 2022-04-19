<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
    public function makefollow($id){

        $user = User::find(Auth()->user()->id);
        $user->following()->attach($id);
        return redirect()->back();
    }
    public function makeunfollow($id){

        $user = User::find(Auth()->user()->id);
        $user->following()->detach($id);
        return redirect()->back();
    }
}
