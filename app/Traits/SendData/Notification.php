<?php

namespace App\Traits\SendData;

use App\Events\MyEvent;
use App\Models\Notification as ModelsNotification;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

trait Notification {

    public function like($post_id , $user_id){
        $user = User::select('name','id')->find($user_id);
        $post = Post::find($post_id);
        $data = [
            'user_name'=> $user->name ,
            'image'=> $user->image->path ?? asset('image/me.jpg') ,
            'post_title'=> $post->title ,
            'time'=> Carbon::now()->diffForHumans() ,
            'type'=> 'like' ,
        ];
        ModelsNotification::create([
            'type'=> 'like' ,
            'post_id'=> $post_id ,
            'user_id'=> $user_id ,
            'post_user_id'=> $post->user_id ,
        ]);
        event(new MyEvent($post->user_id,$data));

    }

    public function comment($post_id , $user_id){
        $user = User::select('name','id')->find($user_id);
        $post = Post::find($post_id);
        $data = [
            'user_name'=> $user->name ,
            'image'=> $user->image->path ?? asset('image/me.jpg') ,
            'post_title'=> $post->title ,
            'time'=> Carbon::now()->diffForHumans() ,
            'type'=> 'comment' ,
        ];
        ModelsNotification::create([
            'type'=> 'comment' ,
            'post_id'=> $post_id ,
            'user_id'=> $user_id ,
            'post_user_id'=> $post->user_id ,
        ]);
        event(new MyEvent($post->user_id,$data));

    }
}
