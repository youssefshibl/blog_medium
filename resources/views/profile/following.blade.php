@extends('profile.assembly')

@section('body-content')
<div class="profile-body" style="display: inline-flex;width: 100%;">
    <div class="profile-info-left" style="display: inline-flex;flex-direction: column;border-right: 1px solid #0000002e;margin: 50px 25px 30px 120px;padding-right: 20px;">
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Lists</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.posts' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Posts</a></span>
        @if (Auth::user()->id == $user->id)
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.likes')}}" style="text-decoration: none;color: unset;">Likes</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.comments')}}" style="text-decoration: none;color: unset;">Comments</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.following')}}" style="text-decoration: none;">Following</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.followers')}}" style="text-decoration: none;color: unset;">Followers</a></span>
        @endif

    </div>
        <div class="profile-right"style="margin-top: 50px;width: 70%;">
            <div class="all-cards" style="display: inline-flex;flex-wrap: wrap">
                @foreach ($following as $follow)
                <div class="only-card" style="padding: 10px 40px;background: #f6f6fa;border-radius: 5px;border: 2px solid #fd483d36;margin: 0px 10px;">
                    <div class="box-image" style="text-align: center;width: 100px;height: 100px;overflow: hidden;border-radius: 50px;">
                        <img src="{{$follow->image->path ?? asset('image/me.jpg')}}" alt="" style="width: 100%;">
                    </div>
                    <div class="title-profile" style="text-align: center;">
                        <h5 style="margin-top: 15px;">{{$follow->name}}</h5>
                    </div>
                    <div class="box-option">
                        <a href="{{route('profile' , ['username' => $follow->name])}}" style="text-decoration: none;color: white;background: #fd483d;padding: 5px 12px;border-radius: 4px;"> go to profile</a>
                        <h5 style="text-decoration: none;color: white;background: #6c757d;padding: 5px 12px;border-radius: 4px;text-align: center;cursor: pointer;"><a href="{{route('makeunfollow',['user_id'=> $follow->id])}}" style="text-decoration: none;color: white"> Un follow</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
