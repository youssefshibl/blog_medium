<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ajax extends Controller
{
    //
    public function account(Request $request){


        if($request->has('username')){

            $user = User::find(Auth::user()->id);
            $user->update(['name'=> $request->input('username')]);
            return true;
        }elseif($request->has('email')){
            $user = User::find(Auth::user()->id);
            $user->update(['email'=> $request->input('email')]);
            return true;
        }elseif($request->has('phone')){
            $user = User::find(Auth::user()->id);
            $user->update(['phone'=> $request->input('phone')]);
            return true;
        }elseif($request->has('address')){
            $user = User::find(Auth::user()->id);
            $user->update(['address'=> $request->input('address')]);
            return true;
        }elseif($request->hasFile('image')){
            //return $request->file('image')->getClientOriginalName() ;
            $name_image = 'image' . rand(1000,1000000000) . '.jpg';
            $file = $request->file('image');
            $name =  $file->getClientOriginalName() ;
            $path = asset('/data/profile/') . '/' . $name_image ;
            $file->move(public_path() . '/data/profile/' , $name_image);
            $user = User::find(Auth::user()->id);
            if(empty($user->image)){
                $user->image()->create(['path'=>$path]) ;
            }else{
                $user->image()->update(['path'=>$path]) ;
            }

            return true;
        }
        return false ;

    }
}
