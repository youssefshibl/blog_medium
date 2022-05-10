<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User ;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Blog extends Controller
{
    //
    public function lists(){
        $lists =  auth()->user()->lists;
        return view('pages_.lists_main' , compact('lists'));
    }


    public function storelist(Request $request){
            if($request->has('list_name')){
                auth()->user()->lists()->create(['name'=> $request->input('list_name')]);
            return true;
            }
            return false ;

    }

    public function deletlist(Request $request){
        if($request->has('deleted_list')){
            auth()->user()->lists()->where('name' , $request->input('deleted_list'))->delete();
            return true;
        }
        return false;
    }
    public function mylists(Request $request){
        $lists =  auth()->user()->lists;
        return view('pages_.list_main_without_creat' , compact('lists'));
    }

    public function showlist(Request $request , $list_name){
        $id_list = auth()->user()->lists()->where('name' , $list_name)->first()->id;

         $posts = auth()->user()->posts()->with('user', 'user.image' )->where('list_id' , $id_list)->get();
         foreach($posts as $post){
            $carbon = new Carbon($post->created_at);
            $post->time_ago = $carbon->diffForHumans();
            $post->time_ago = Carbon::parse($post->created_at)->format('M d');
            $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
        }

         //return $posts ;

         return view('pages_.main_one' , compact('posts'));
    }

    // show notification
    public function notifications(){

        $user = User::find(Auth::user()->id);

        $data =   $user->notifications()->orderBy('created_at' , 'desc')->get();
        $notifications = $data->transform(function ($item, $key) {
            return [
                'name' => User::find($item->user_id)->name,
                'type' => $item->type,
                'post_title' => Post::find($item->post_id)->title,
                'time' => Carbon::parse($item->created_at)->diffForHumans(),
                'post_id' => $item->post_id,
                'image_url' => User::find($item->user_id)->image->path ?? asset('image/me.jpg'),
            ];
        });
        return view('pages_.notifications' , compact('notifications'));
        //return $notifications ;
    }
}
