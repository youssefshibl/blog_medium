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
    // function writeup to save the iamge upload from user in writeup page by ajax and return the path
    // of image in server side
    public function writeup(Request $request){
        if($request->has('image')){
            $name_image = 'image_writeup_' . self::getName(20) . '.jpg';
            $file = $request->file('image');
            $path = asset('/data/writeup/') . '/' . $name_image ;
            $file->move(public_path() . '/data/writeup/' , $name_image);
            return $path ;
        }
        return false ;
    }

    public function delet_image(Request $request){
        if($request->has('delet_image')){
$name = $request->input('delet_image');
$path = public_path() . '/data/writeup/' . $name ;
unlink($path);
return true;

        }
        return false;
    }
    // function getName to generate random name for images
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
