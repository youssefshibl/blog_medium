<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {

        $search = $request->input('search');
        $posts = Post::where('title', 'like', '%' . $search . '%')->get();
        foreach ($posts as $post) {
            // make data for every post
            $carbon = new Carbon($post->created_at);
            $post->time_ago = $carbon->diffForHumans();
            $post->time_ago = Carbon::parse($post->created_at)->format('M d');
            $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
        }
        if (Auth::guest()) {
            return view('home_page');
        }

         // get id of all posts save
        $lists =  auth()->user()->list_save()->with('postsinsave')->get();
        $array_posts_save = [];
        foreach($lists as $list){
            $posts_ = $list->postsinsave;
            foreach($posts_ as $post){
                $array_posts_save[] = $post->id;
            }
        }

             //return $posts ;
        return view('pages_.main_one', compact('posts' , 'array_posts_save'));

    }
}
