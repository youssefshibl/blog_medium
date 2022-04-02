<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;
use Carbon\Carbon;
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
}
