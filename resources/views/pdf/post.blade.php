
@extends('pdf.assembly')

@section('body-content')

<div class="middle_body" style="  border: none;margin-top: 0px;">
    {{-- icons for comment and clap  --}}

    <div class="cont-editor">
       <div class="body_art" contenteditable="false">

            @isset($post->image->path)
            <div class="image-main" style="text-align: center;height: 400px;overflow: hidden;">
            <img src="{{$post->image->path }}" alt="" style="height: 100%;">
            </div>
            @endisset

           <h1 style="padding-bottom: 20px;border-bottom: 1px solid #0000002e;" >{{ $post->title}}

           </h1>

         {!!  $post->body  !!}
       </div>
   </div>
</div>



@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/blog_show.css')}}">
@endsection

@section('script')
<script src="{{ asset('js/main_one.js') }}"></script>
<script src="{{asset('js/writeup.js') }}"></script>
@endsection

