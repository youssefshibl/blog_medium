<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavePosts extends Controller
{
    //
    public function index(){
        $lists =  auth()->user()->list_save;
    return view('pages_.lists_save' , compact('lists' ,$lists));
    }

    public function show($list){
        $posts = auth()->user()->list_save()->where('name' , $list)->first()->postsinsave()->get();
        $array_posts_save = [];
        foreach($posts as $post){
            $array_posts_save[] = $post->id;
        }
        return view('pages_.main_one', compact('posts' , 'array_posts_save'));
    }
}
