@extends('layouts.app')

@section('content')
    <a href="/laravelone/public/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:20%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    {{-- <small>Written on {{$post->created_at}} by {{$post->user->name}}</small> --}}
    <small>Written from {{   $post->created_at}} by {{$post->id}}</small>
    <hr>
    <h1>{{ Auth::user()->id }}</h1>
    <h1>{{$post->user_id}}</h1>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="{{route('posts.edit',['post'=> $post->id])}}" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['App\Http\Controllers\PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
