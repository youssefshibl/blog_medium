<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWriteUp;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Traits\SendData\SendToBlog;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\This;

class PostController extends Controller
{

    use SendToBlog ;

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
        //$this->middleware('referer')->only(['store', 'update', 'destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $posts = Post::with('user', 'user.image' , 'image')->get();

        foreach ($posts as $post) {
            // make data for every post
            $carbon = new Carbon($post->created_at);
            $post->time_ago = $carbon->diffForHumans();
            $post->time_ago = Carbon::parse($post->created_at)->format('M d');
            $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
        }
        if (Auth::guest()) {
            $trend = Post::skip(0)->take(6)->get();
            if($request->has('search')){
                $posts = Post::where('title', 'like', '%' . $request->search . '%')->get();
                foreach ($posts as $post) {
                    // make data for every post
                    $carbon = new Carbon($post->created_at);
                    $post->time_ago = $carbon->diffForHumans();
                    $post->time_ago = Carbon::parse($post->created_at)->format('M d');
                    $post->body = preg_replace( '/(<[^<>]*>|&nbsp;)/i','',$post->body);
                }
                return view('home_page', compact('posts' , 'trend'));
            }
            return view('home_page')->with('posts', $posts)->with('trend' , $trend);
            //return $posts[0]->user->image->path;
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
        //after validate data store it in database
        $rules = [
         'title' => 'required|unique:posts',
         'body'=> 'required',
         'list'=> 'required',
         'main_image'=>'required',
        ];
        $validate_data = Validator::make($request->all() , $rules);
        if($validate_data->fails()){
             return $this->send_error('E001' , $this->get_array_of_message_error($validate_data));
        }

        // if it validate
        //save image in server
            $name_image = 'image' . self::getName(20) . '.jpg';
            $file = $request->file('main_image');
            $name =  $file->getClientOriginalName();
            $path = asset('/data/post_image/') . '/' . $name_image;
            $file->move(public_path() . '/data/post_image/', $name_image);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->list_id = auth()->user()->lists()->where('name' , $request->list )->get()->first()->id;
        $post->save();
        $post->image()->create(['path' => $path]);
        return $this->send_succ();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        return  view('pages_.writeup')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $post = Post::find($id);
        if (Auth::user()->id == $post->user_id) {
            return view('blog.edit')->with('post', $post);
            return view('blog.edit');
        } else {
            return redirect()->route('posts.show', $id)->with('unauthorized-post', 'Unathorized');
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
 // rule of validation
        $rules = [
            'title' => 'required',
         'body'=> 'required',
         'list'=> 'required',

        ];
        //check validation
        $validate_data = Validator::make($request->all() , $rules);
        if($validate_data->fails()){
             return $this->send_error('E001' , $this->get_array_of_message_error($validate_data));
        }
        // after validate update this change
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->list_id = auth()->user()->lists()->where('name' , $request->list )->get()->first()->id;
        $post->save();
        if($request->main_image != ''){
            // first delet old image
            $array_image = explode( "/", $post->image()->first()->path);
            $name_delet = end($array_image);
            $path_delet = public_path() . '/data/post_image/' . $name_delet;
            unlink($path_delet);

            $name_image = 'image' . self::getName(20) . '.jpg';
            $file = $request->file('main_image');
            $name =  $file->getClientOriginalName();
            $path = asset('/data/post_image/') . '/' . $name_image;
            $file->move(public_path() . '/data/post_image/', $name_image);
            $post->image()->first()->update(['path' => $path]);
        }

       //redirect to this writeup
        return $this->send_succ();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::find($id);
        if (Auth::user()->id == $post->user_id) {
            $post->delete();
            return redirect('/posts')->with('success', 'post Deleted');
        } else {

            return redirect()->route('posts.show', $id)->with('error', 'Unathorized');
        }

    }


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
    public function beforelogin(){
        $lange = Auth::user()->lange;
        Session::put('locale', $lange);
        app()->setLocale($lange);
        return redirect()->route('home');
        //return $lange ;
    }
}
