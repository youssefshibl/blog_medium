
@extends('pages_.assembly')

@section('body-content')

<div class="middle_body">
    <div class="cont-editor">


       <div class="body_art" contenteditable="false">
           <h1>{{ $post->title}}</h1>
         {!!  $post->body  !!}
       </div>
   </div>

</div>



@endsection
@section('style')
<link rel="stylesheet" href="{{asset('css/blog_show.css')}}">

@endsection
