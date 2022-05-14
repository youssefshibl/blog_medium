<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class Authcontroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:user-api', ['except' => ['login','tokenexpire']]);
    }

    public function login(Request $request){
        $rules = [
            'email'=>'required',
            'password'=> 'required'
        ];

        $validate_data = Validator::make($request->all() , $rules);
        if($validate_data->fails()){
            return $validate_data->errors()->toArray();
        }
        // make check to this data in database
        $token = Auth::guard('user-api')->attempt($request->only(['email' , 'password']));
        if(!$token){
            return response()->json(['status'=>false , 'message'=>'invalid data']);
        }
        // if we find user in database return token
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(Auth::guard('user-api')->user());
    }

    public function logout(Request $request)
    {
        //JWTAuth::invalidate(JWTAuth::getToken());
        Auth::guard('user-api')->logout(true);
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        $newtoken = Auth::guard('user-api')->refresh(true);
        return $this->respondWithToken($newtoken);
    }

    public function tokenexpire()
    {
        return response()->json(['message' => 'token expire']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth('user-api')->formatter->formatExpiresIn(auth('user-api')->formatter->getTime()),
            'expires_in' => 'full time',
        ]);
    }

}
