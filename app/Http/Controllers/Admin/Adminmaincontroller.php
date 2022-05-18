<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Likes;
use App\Models\ListSave;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Adminmaincontroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['showlogin', 'login']);
    }
    // show login page
    public function showlogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('admin.login');
    }

    // check login
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error', 'Email or Password is incorrect');
    }
    // show dashboard
    public function dashboard()
    {
        $number_of_users = User::count();
        $number_of_posts = Post::count();
        $number_of_likes = Likes::count();
        $number_of_comments = Comments::count();

        return view('admin.index', compact(['number_of_users', 'number_of_posts', 'number_of_likes', 'number_of_comments']));
    }
    // ---------------------------------- every thing about users ----------------------------------
    // show users
    public function showusers()
    {
        $users = User::paginate(10);
        return view('admin.users.users', compact('users'));
    }
    // show users search
    public function searchusers(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->paginate(2);
        return view('admin.users.users', compact('users'));
    }
    // delet user
    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
    // show user porfile
    public function showprofile($id)
    {
        $user = User::find($id);
        $lists = $user->lists()->get();

        return view('admin.users.profile_index', compact('user', 'lists'));
    }
    // show lists of user
    public function showlists($id)
    {
        $user = User::find($id);
        $lists = $user->lists()->get();
        return view('admin.users.profile_lists', compact('lists', 'user'));
    }

    public function showposts($id)
    {
        $user = User::where('id', $id)->first();
        if ($user != null) {
            $posts = $user->posts()->get();
            foreach ($posts as $post) {
                $post->body = preg_replace('/(<[^<>]*>|&nbsp;)/i', '', $post->body);
            }


            return view('admin.users.profile_posts', compact('posts', 'user'));
        }
    }

    public function showlist($username, $listname){
        $user = User::where('name' , $username)->first();
        if($user != null){
            $list = $user->lists()->where('name' , $listname)->first();
            if($list != null){
                $posts = $list->posts()->get();
                foreach ($posts as $post) {
                    $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
                }
                $user = User::where('name' , $username)->first();

                return view('admin.users.profile_posts' , compact('posts','user'));
            }
        }
    }

    public function deletepost($post){
        $post = Post::find($post);
        $post->delete();
        return redirect()->back()->with('success' , 'Post Deleted Successfully');
    }

    public function showpost($id){
        $post = Post::find($id);
        $user = User::find($post->user_id);
        $post->date = Carbon::parse($post->created_at)->format('M d');
        return  view('admin.users.postshow')->with('post', $post)->with('user', $user);
    }

    public function showlikes($username){
        $user = User::where('name' , $username)->first();
        $posts = $user->likes()->get();
        foreach ($posts as $post) {
            $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
        }
        return view('admin.users.profile_likes' , compact('posts','user'));
    }

    public function showcomments($username){
        $user = User::where('name' , $username)->first();
            $comments = $user->comments()->get();
            return view('admin.users.profile_comments' , compact('comments','user'));
    }

    public function showcomment($post_id){

        $post = Post::find($post_id);
        $user = User::find($post->user_id);
        $comments = Post::find($post_id)->comments()->with(['user',
                                                            'user.image',
                                                            'getchildcomments' ,
                                                            'getchildcomments.user' ,
                                                            'getchildcomments.user.image'])->where('parent_id', 0)->get();
        return view('admin.users.comments',compact(['comments' , 'post_id' , 'post' , 'user']));
    }

    public function deletecomment($id){
        $comment = Comments::find($id);
        $comment->delete();
        $comments = Comments::where('parent_id', $id)->get();
        $comment->delete();
        return redirect()->back()->with('success' , 'Comment Deleted Successfully');

    }

    public function focuscomment($post_id, $comment_id){
        $post = Post::find($post_id);
        $user = User::find($post->user_id);
        $comments = Post::find($post_id)->comments()->with(['user',
                                                            'user.image',
                                                            'getchildcomments' ,
                                                            'getchildcomments.user' ,
                                                            'getchildcomments.user.image'])->where('parent_id', 0)->get();
        return view('admin.users.comments',compact(['comments' , 'post_id' , 'post' , 'user' , 'comment_id']));
    }

    public function showfollowing($username){
        $user = User::where('name' , $username)->first();
        $following = $user->following()->get();
        return view('admin.users.profile_following' , compact('following','user'));
    }

    public function showfollowers($username){
        $user = User::where('name' , $username)->first();
        $followers = $user->follower()->get();
        return view('admin.users.profile_followers' , compact('followers','user'));
    }

    public function showsavelists($username){
        $user = User::where('name' , $username)->first();
        $lists = $user->list_save()->get();
        return view('admin.users.profile_save_lists' , compact('lists','user'));
    }

    public function showpostssavelist($username, $listname){
        $user = User::where('name' , $username)->first();
        $posts = ListSave::where('name' , $listname)->first()->postsinsave()->get();
        if ($user != null) {
            foreach ($posts as $post) {
                $post->body = preg_replace('/(<[^<>]*>|&nbsp;)/i', '', $post->body);
            }
            return view('admin.users.profile_posts', compact('posts', 'user'));
        }
    }

// --------------------------------posts method in admin dashboard--------------------------------------

    public function posts_showposts()
    {
        $posts = Post::paginate(2) ;
        foreach ($posts as $post) {
            $post->body = preg_replace('/(<[^<>]*>|&nbsp;)/i', '', $post->body);
        }
        return view('admin.posts.posts_index', compact('posts'));
    }

    public function posts_searchposts(Request $request)
    {
        $posts = Post::where('title', 'like', '%' . $request->search . '%')->paginate(2);
        foreach ($posts as $post) {
            $post->body = preg_replace('/(<[^<>]*>|&nbsp;)/i', '', $post->body);
        }
        return view('admin.posts.posts_index', compact('posts'));
    }

    //---------------------------------- others -----------------------------------
    public function others_show(){
        $tags = Tag::all();
        return view('admin.others.one'  , compact('tags'));
    }

    public function addtag(Request $request){

        $tag = new Tag();
        $tag->name = $request->tag_name;
        $tag->save();
        return redirect()->back()->with('success' , 'Tag Added Successfully');
    }




    public function test()
    {
        $value = 'test';
        return User::where(function ($qu) use ($value){
            $qu->where('name', 'like', '%' . $value . '%')->orWhere('email', 'like', '%' . $value . '%');
        })->get();
    }
    // make logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.index');
    }
}
