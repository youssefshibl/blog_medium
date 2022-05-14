<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Traits\SendData\SendToBlog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Apicontroller extends Controller
{
    //
    use SendToBlog;
    public function __construct()
    {
        $this->middleware('auth:user-api');

    }

    public function index(Request $request){

        $posts = Post::with('user', 'user.image' , 'image')->get();
        $posts->each(function($post){
            $carbon = new Carbon($post->created_at);
            $post->time_ago = $carbon->diffForHumans();
            $post->time_ago = Carbon::parse($post->created_at)->format('M d');
            $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
        });
        return $this->send_data('data',$posts);

    }

    public function posts(Request $request){
        $user = User::find(Auth::guard('user-api')->user()->id);
        $posts =  $user->posts()->with('user', 'user.image' , 'image')->get();
        $posts->each(function($post){
            $carbon = new Carbon($post->created_at);
            $post->time_ago = $carbon->diffForHumans();
            $post->time_ago = Carbon::parse($post->created_at)->format('M d');
            $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
        });
        return $this->send_data('data',$posts);
    }

    public function lists(Request $request){
        $user = User::find(Auth::guard('user-api')->user()->id);
        $lists =  $user->lists()->select('name' , 'id')->get();
        $lists->each(function($list){
            $list->posts = Post::where('list_id',$list->id)->count();
        });
        return $this->send_data('data',$lists);
    }

    public function savelists(){
        $user = User::find(Auth::guard('user-api')->user()->id);
        $lists =  $user->list_save()->select('name' )->get();
        $lists->each(function($list){
            $list->posts = Post::where('list_id',$list->id)->count();
        });
        return $this->send_data('data',$lists);
    }

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
        return $this->send_data('data',$notifications);
    }
    public function post($post){
        $post = Post::with(['user' => function ($q){
            $q->select('id','name');
        } , 'user.image' => function($q){
            $q->select('path','imageable_id');
        } , 'image' => function($q){
            $q->select('path', 'imageable_id');
        }])->find($post);
        
        if($post){
        return $this->send_data('data',$post);
        }else{
            return $this->send_error('404','Post not found');
        }
    }
}
