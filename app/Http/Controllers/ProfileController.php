<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index($username)
    {
        //
        if(User::where('name' , $username)->first() != null){

        $lists = User::where('name' , $username)->first()->lists()->get();
        $user = User::where('name' , $username)->first();
        return view('profile.index' , compact('user' , 'lists'));
        }
    }
    
    public function posts($username){
        $user = User::where('name' , $username)->first();
        if($user != null){
            $posts = $user->posts()->get();
            foreach ($posts as $post) {
                $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
            }
            $user = User::where('name' , $username)->first();
            $lists =  auth()->user()->list_save()->with('postsinsave')->get();
            $array_posts_save = [];
            foreach($lists as $list){
                $posts_ = $list->postsinsave;
                foreach($posts_ as $post){
                    $array_posts_save[] = $post->id;
                }
            }
            return view('profile.posts' , compact('posts','user','array_posts_save'));
        }

    }

    public function showlist($username , $listname){
        $user = User::where('name' , $username)->first();
        if($user != null){
            $list = $user->lists()->where('name' , $listname)->first();
            if($list != null){
                $posts = $list->posts()->get();
                foreach ($posts as $post) {
                    $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
                }
                $user = User::where('name' , $username)->first();
                $lists =  auth()->user()->list_save()->with('postsinsave')->get();
                $array_posts_save = [];
                foreach($lists as $list){
                    $posts_ = $list->postsinsave;
                    foreach($posts_ as $post){
                        $array_posts_save[] = $post->id;
                    }
                }
                return view('profile.showlist' , compact('posts','user','list','array_posts_save'));
            }
        }
    }

    public function showlikes(){
             $user = User::find(Auth::user()->id);
            $posts = $user->likes()->get();
            foreach ($posts as $post) {
                $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
            }
            $lists =  auth()->user()->list_save()->with('postsinsave')->get();
            $array_posts_save = [];
            foreach($lists as $list){
                $posts_ = $list->postsinsave;
                foreach($posts_ as $post){
                    $array_posts_save[] = $post->id;
                }
            }
            return view('profile.likes' , compact('posts','user','array_posts_save'));

    }

    public function showcomments(){
            $user = User::find(Auth::user()->id);
            $comments = $user->comments()->get();
            return view('profile.comments' , compact('comments','user'));


    }

    public function showfollowing(){
            $user = User::find(Auth::user()->id);
            $following = $user->following()->get();
            return view('profile.following' , compact('following','user'));
            //return $following[0]->image()->path ;
    }

    public function showfollowers(){
        $user = User::find(Auth::user()->id);
        $following = $user->follower()->get();
        return view('profile.followers' , compact('following','user'));
        //return $following ;
    }

}
