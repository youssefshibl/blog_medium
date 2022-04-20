@extends('profile.assembly')

@section('body-content')
<div class="profile-body" style="display: inline-flex;width: 100%;">
    <div class="profile-info-left" style="display: inline-flex;flex-direction: column;border-right: 1px solid #0000002e;margin: 50px 25px 30px 120px;padding-right: 20px;">
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Lists</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.posts' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Posts</a></span>
        @if (Auth::user()->id == $user->id)
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.likes')}}" style="text-decoration: none;color: unset;">Likes</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.comments')}}" style="text-decoration: none;">Comments</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.following')}}" style="text-decoration: none;color: unset;">Following</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.followers')}}" style="text-decoration: none;color: unset;">Followers</a></span>
       @endif

    </div>
        <div class="profile-right"style="margin-top: 50px;width: 70%;">
            <ul class="list-group">
                @foreach ($comments as $comment)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{route('posts.comments.index' , ['post'=> $comment->post_id])}}" style="text-decoration: none">{{$comment->comment}}</a>
                  </li>
                @endforeach

              </ul>
        </div>
    </div>
</div>

@endsection
