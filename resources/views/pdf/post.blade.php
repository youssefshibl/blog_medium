
@extends('pdf.assembly')

@section('body-content')

<div class="middle_body" style="  border: none;margin-top: 0px;">
    {{-- icons for comment and clap  --}}
    <div class="box-title-gen" style="display: flex;justify-content: space-between;">
        <div class="box-title" style="display: flex;align-items: center;">
            <div class="box-image">
                <img src="{{ $user->image->path ?? '/image/me.jpg' }}" alt="">
            </div>
            <span><a href="{{route('profile' , ['username' => $user->name])}}" style="text-decoration: none;color: rgba(32, 32, 32, 0.795)">{{ $post->user->name}}</a></span>
            <span>{{  $post->date }}</span>
        </div>


    </div>

    <div class="cont-editor">
       <div class="body_art" contenteditable="false">

            @isset($post->image->path)
            <div class="image-main" style="text-align: center;height: 400px;overflow: hidden;">
            <img src="{{$post->image->path }}" alt="" style="height: 100%;">
            </div>
            @endisset

           <h1 style="padding-bottom: 20px;border-bottom: 1px solid #7021212e;" >{{ $post->title}}

           </h1>

         {!!  $post->body  !!}
       </div>
   </div>
</div>



@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/blog_show.css')}}">
@endsection



