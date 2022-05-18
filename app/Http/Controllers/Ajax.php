<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Events\Sendall;
use App\Models\ListSave;
use App\Models\Post;
use App\Models\User;
use App\Traits\SendData\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\SendData\SendToBlog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Ajax extends Controller
{
    use SendToBlog;
    use Notification;

    //
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('referer')->only(['store', 'update', 'destroy']);
    }
    public function account(Request $request)
    {


        if ($request->has('username')) {

            $user = User::find(Auth::user()->id);
            $user->update(['name' => $request->input('username')]);
            return true;
        } elseif ($request->has('email')) {
            $user = User::find(Auth::user()->id);
            $user->update(['email' => $request->input('email')]);
            return true;
        } elseif ($request->has('phone')) {
            $user = User::find(Auth::user()->id);
            $user->update(['phone' => $request->input('phone')]);
            return true;
        } elseif ($request->has('address')) {
            $user = User::find(Auth::user()->id);
            $user->update(['address' => $request->input('address')]);
            return true;
        } elseif ($request->hasFile('image')) {
            //return $request->file('image')->getClientOriginalName() ;
            $name_image = 'image' . rand(1000, 1000000000) . '.jpg';
            $file = $request->file('image');
            $name =  $file->getClientOriginalName();
            $path = asset('/data/profile/') . '/' . $name_image;
            $file->move(public_path() . '/data/profile/', $name_image);
            $user = User::find(Auth::user()->id);
            if (empty($user->image)) {
                $user->image()->create(['path' => $path]);
            } else {
                $user->image()->update(['path' => $path]);
            }
            return true;
        } elseif ($request->has('lange')) {

            Session::put('locale', $request->input('lange'));
            $user = User::find(Auth::user()->id);
            $user->update(['lange' => $request->input('lange')]);
            return true;
        } elseif ($request->has('currentpassword') && $request->has('newpassword') && $request->has('confirmnewpassword')) {
            $user = User::find(Auth::user()->id);
            if (password_verify($request->input('currentpassword'), $user->password)) {
                if ($request->input('newpassword') == $request->input('confirmnewpassword')) {
                    $user->update(['password' => bcrypt($request->input('newpassword'))]);
                    return $this->send_succ();
                } else {
                    return $this->send_error('E002', 'password not match');
                }
            } else {
                return $this->send_error('E001', 'Current password is not correct');
            }
        };
        return false;
    }
    // function writeup to save the iamge upload from user in writeup page by ajax and return the path
    // of image in server side
    public function writeup(Request $request)
    {
        if ($request->has('image')) {
            $name_image = 'image_writeup_' . self::getName(20) . '.jpg';
            $file = $request->file('image');
            $path = asset('/data/writeup/') . '/' . $name_image;
            $file->move(public_path() . '/data/writeup/', $name_image);
            return $path;
        }
        return false;
    }

    public function delet_image(Request $request)
    {
        if ($request->has('delet_image')) {
            $name = $request->input('delet_image');
            $path = public_path() . '/data/writeup/' . $name;
            unlink($path);
            return true;
        }
        return false;
    }
    // function getName to generate random name for images
    static function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public function getlists()
    {
        //$lists = auth()->user()->list_save()->with('postsInSave')->get() ;
        $lists = auth()->user()->list_save()->select('name')->get();
        $list_array = [];
        foreach ($lists as $list) {
            $list_array[] = $list['name'];
        }
        return $this->send_data('lists', $list_array);
    }

    public function makenewlist(Request $request)
    {
        $list_name = $request->list;
        auth()->user()->list_save()->create(['name' => $list_name]);
        return $this->send_data('name', $list_name);
    }

    public function savepost(Request $request)
    {
        //-----------------------------------------------------------------
        //         $user = User::find(Auth::user()->id);
        //         $posts_in = $user->list_save()
        //                           ->where('name' , 'save_list_name')
        //                           ->with('postsinsave')->first();
        // return $posts_in->postsinsave;
        //----------------------------------------------------

        $user = User::find(Auth::user()->id);
        $posts_in = $user->list_save()
            ->where('name', $request->list_name)
            ->first()
            ->postsinsave()
            ->attach($request->list_number);

        return $this->send_succ();
        //---------------------------------------------
        // return $posts_in ;
        // // $posts = ListSave::where('name' , 'save_list_name')->get()[0]->postsInSave()->attach(10);
        // // return $posts ;
    }

    public function delet_save_list(Request $request)
    {
        if ($request->has('delet_save_list')) {
            $list =   auth()->user()->list_save()->where('name', $request->delet_save_list)->first();
            if (!empty($list)) {
                auth()->user()->list_save()->where('name', $request->delet_save_list)->delete();
                return $this->send_succ();
            } else {
                return $this->send_error('E001', 'this list name not found ');
            }
        }
    }


    public function unsave_post(Request $request)
    {
        //return auth()->user()->list_save()->with('postsinsave')->where('postsinsave.0.id' , 12)->first();

        //return Auth::user()->list_save()->with('postsinsave')->whereJsonContains('postsinsave' , [['id'=> 12]])->get() ;

        //------------------------------------
        //unsave to post
        $lists = auth()->user()->list_save()->with('postsinsave')->get();
        foreach ($lists as $list) {
            $posts = $list->postsinsave;
            foreach ($posts as $post) {
                if ($post->id == $request->unsave_post) {
                    $list->postsinsave()->detach($request->unsave_post);
                    return $this->send_succ();
                }
            }
        }
        return $this->send_error('E001', 'this post not saved before ');
    }

    public function makelike(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->likes()->attach($request->post_id);
        $user_post_id = Post::find($request->post_id)->user_id;
        //event(new Sendall('hello world' , $user_post_id));
        $this->like($request->post_id, Auth::user()->id);
        return $this->send_succ();
    }
    public function dislike(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->likes()->detach($request->post_id);
        return $this->send_succ();
    }

    public function notifications(Request $request)
    {
        $user = User::find(Auth::user()->id);
        //$data =   $user->notifications()->where('seen', 0)->get();
        $data =   $user->notifications()->orderBy('created_at' , 'desc')->limit(10)->get();

        $newdata = $data->transform(function ($item, $key) {
            return [
                'name' => User::find($item->user_id)->name,
                'type' => $item->type,
                'post_title' => Post::find($item->post_id)->title,
                //'time' => Carbon::parse($item->created_at)->format('M d h:i A'),
                'time' => Carbon::parse($item->created_at)->diffForHumans(),
                'post_id' => $item->post_id,
                'image_url' => User::find($item->user_id)->image->path ?? asset('image/me.jpg'),
            ];
        });

        DB::table('notifications')->where('post_user_id', Auth::user()->id)->update(['seen' => 1]);
        //return array_reverse($newdata->toArray());
        return $newdata->toArray();
    }


    public function get_more_posts($posts){
        $posts = Post::skip($posts)->take(5)->get();
        $posts->each(function($post){
            $carbon = new Carbon($post->created_at);
            $post->time_ago = $carbon->diffForHumans();
            $post->time_ago = Carbon::parse($post->created_at)->format('M d');
            $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
        });
        return view('small_components.post' , compact('posts' ));
    }
}
