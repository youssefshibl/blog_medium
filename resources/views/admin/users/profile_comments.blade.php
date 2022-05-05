@extends('admin.users.assembly')

@section('body-content')
@if (session('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 20px">
        {{ session('success') }}
    </div>
@endif
<div class="profile-body" style="display: inline-flex;width: 100%;">
    <div class="profile-info-left" style="display: inline-flex;flex-direction: column;border-right: 1px solid #0000002e;margin: 50px 25px 30px 120px;padding-right: 20px;">
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.showprofile' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Infomation</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.lists' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Lists</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.posts' , ['id'=> $user->id])}}" style="text-decoration: none;">Posts</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.likes.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Likes</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.comments.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Comments</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.following')}}" style="text-decoration: none;color: unset;">Following</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.followers')}}" style="text-decoration: none;color: unset;">Followers</a></span>


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

@endsection


@section('script')
<script>
            document.querySelector('.components-me').classList.add('active');
            document.querySelector('.components-me-user').classList.add('collapsed');
            document.querySelector('.components-me-show').classList.add('show');
            document.querySelector('.users-me').classList.add('active');
    </script>
@endsection
