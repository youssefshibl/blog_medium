<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'api.token'] ,function(){
    Route::post('test' , function(Request $request){
        // chech that he send email and password
        $rules = [
            'email'=>'required',
            'password'=> 'required'
        ];
        $validate_data = Validator::make($request->all() , $rules);
        if($validate_data->fails()){
            return $validate_data->errors()->toArray();
        }
        // make check to this data in database
        $token = Auth::guard('api-test')->attempt($request->only(['email' , 'password']));
        if(!$token){
            return response()->json(['status'=>false , 'message'=>'can\'t find this user ']);
        }
        // if we find user in database return token
       return response()->json([
           'access_token' => $token ,
           "token_type" => "bearer",
           "expires_in" => 'full_time'
       ]);

    });
});

