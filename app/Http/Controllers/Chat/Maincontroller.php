<?php

namespace App\Http\Controllers\Chat;

use App\Events\Chat;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Maincontroller extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('chat.index');
    }


    public function sendmessage(Request $request){
        //return $request->all();
        $user = User::find(Auth::user()->id);
        $user->messages()->create([
            'message' => $request->message,
            'to_user_id' => $request->send_to,
        ]);
        $data =[
            'message' => $request->message,
            'time' => Carbon::now()->format('h:i A | M d'),
            'image_url' => $user->image->path ?? asset('image/me.jpg'),
        ] ;

        event(new Chat($request->send_to, $data));

        return response()->json(['status' => 'success'], 200);
    }

    public function getmessages(Request $request){
        $user = User::find(Auth::user()->id);
        $send_to = $request->send_id;
        $messages = Message::where( function($query) use($user , $send_to){
            $query->where('user_id', $user->id)->where('to_user_id', $send_to);
        })->orWhere(function($query) use($user , $send_to){
            $query->where('to_user_id', $user->id)->where('user_id', $send_to);
        })->orderBy('created_at' , 'asc')->get();
        $newmessages = $messages->transform(function ($item, $key) {
            $type = '';
            if($item->user_id == Auth::user()->id){
                $type = 'send';
            }else{
                $type = 'receive';
            }
            return [
                'time' => Carbon::parse($item->created_at)->format('h:i A | M d'),
                'message' => $item->message,
                'type' => $type,
            ];
        });
        $image = User::find($send_to)->image->path ?? asset('image/me.jpg');
        return response()->json(['status' => true ,
                                 'data' => $newmessages,
                                 'image' => $image
                                ], 200);
    }
}
