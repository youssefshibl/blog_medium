<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Traits\SendData\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class Comments extends Controller
{
    use Notification;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        //
        $post = Post::find($post_id);
        $comments = Post::find($post_id)->comments()->with(['user',
                                                            'user.image',
                                                            'getchildcomments' ,
                                                            'getchildcomments.user' ,
                                                            'getchildcomments.user.image'])->where('parent_id', 0)->get();
        return view('pages_.comments',compact(['comments' , 'post_id' , 'post']));
      // return response()->json($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $post)
    {
        //
        $validated = $request->validate([
            'addComment' => 'required',

        ]);

        $user = User::find(Auth::user()->id);
        $user->comments()->create([
            'comment' => $request->addComment,
            'post_id' => $post,
        ]);
        $this->comment($post, $user->id);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id,$comment_id)
    {
        //
        $validated = $request->validate([
            'editComment' => 'required',

        ]);

        $user = User::find(Auth::user()->id);
        $comment = $user->comments()->find($comment_id);
        $comment->comment = $request->editComment;
        $comment->save();
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post, $comment)
    {
        //
        $user = User::find(Auth::user()->id);
        $comment = $user->comments()->find($comment);
        $comment->delete();
        return redirect()->back();
    }



    public function storechildcomment(Request $request , $post_id)
    {
        //
        $validated = $request->validate([
            'addComment' => 'required',

        ]);

        $user = User::find(Auth::user()->id);
        $user->comments()->create([
            'comment' => $request->addComment,
            'parent_id' => $request->parent_id,
            'post_id' => $request->post_id,
        ]);
        $this->comment($post_id, $user->id);

        return redirect()->back();
    }
}
