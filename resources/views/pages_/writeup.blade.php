
@extends('pages_.assembly')

@section('body-content')

<div class="middle_body">

    <div class="cont-editor">




       <div class="body_art" contenteditable="false">
           <h1>{{ $post->title}}
           @if ($post->user_id == auth()->user()->id)
           <a href="{{route('posts.edit' , ['post'=> $post->id])}}"><i style="margin-left: 30px;cursor: pointer;color: #006c87;" class="fa-solid fa-pen-to-square"></i></a>
           @endif
        </h1>
         {!!  $post->body  !!}
       </div>
   </div>

</div>



@endsection
@section('style')
<link rel="stylesheet" href="{{asset('css/blog_show.css')}}">

@endsection
