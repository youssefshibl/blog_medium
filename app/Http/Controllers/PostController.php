<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index' , 'show']);
        $this->middleware('referer')->only(['store','update' , 'destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $posts = Post::with('user', 'user.image' )->get();

        foreach($posts as $post){
            $carbon = new Carbon($post->created_at);
            $post->time_ago = $carbon->diffForHumans();
            $post->time_ago = Carbon::parse($post->created_at)->format('M d');
        }
        if(Auth::guest()){
            return view('home_page');
        }


         return view('pages_.main_one' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // sure that data is not empty
        $this->validate($request , [
            'title'=> 'required',
            'body'=>'required'
        ]);
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success' , 'post created ') ;
        //return $request->all();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        $post = Post::find($id);
        return view('posts.show')->with('post' , $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        if(Auth::user()->id == $post->user_id){
            return view('posts.edit')->with('post' , $post);
        }else{
            return redirect()->route('posts.show' , $id)->with('error', 'Unathorized');
    }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request , [
            'title'=> 'required',
            'body'=>'required'
        ]);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        $yes = 'll';
        return redirect()->route('posts.show', $id)->with('success' , 'post updated') ;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        if(Auth::user()->id == $post->user_id){
            $post->delete();
            return redirect('/posts')->with('success' , 'post Deleted') ;
        }else{

            return redirect()->route('posts.show' , $id)->with('error', 'Unathorized');

        }
    }
    public function test(User $post){
return $post;
    }
}
