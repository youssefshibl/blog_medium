@extends('admin.users.assembly')

@section('body-content')

<div class="profile-body" style="display: inline-flex;width: 100%;">
    <div class="profile-info-left" style="display: inline-flex;flex-direction: column;border-right: 1px solid #0000002e;margin: 50px 25px 30px 120px;padding-right: 20px;">
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.showprofile' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Infomation</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.lists' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Lists</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.posts' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Posts</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.likes.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Likes</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.comments.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Comments</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.following.show' , ['username'=> $user->name])}}" style="text-decoration: none;">Following</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.followers.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Followers</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.savelists.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Save lists</a></span>


    </div>
    <div class="profile-right"style="margin-top: 50px;width: 70%;">
        <div class="all-cards" >
            @foreach ($following as $follow)
            <a href="{{ route('admin.users.showprofile' , ['id'=> $follow->id])}}" style="text-decoration: none;color:unset">
                <div class="only-card" style="padding: 10px 40px;background: #f6f6fa;border-radius: 5px;border: 2px solid #fd483d36;margin: 0px 10px;display: flex;margin-bottom: 10px;" >
                    <div class="box-image" style="text-align: center;width: 50px;height: 50px;overflow: hidden;border-radius: 25px;margin-right: 20px;" >
                        <img src="{{$follow->image->path ?? asset('image/me.jpg')}}" alt="" style="width: 100%;">
                    </div>
                    <div class="title-profile" style="text-align: center;">
                        <h5 style="margin-top: 15px;">{{$follow->name}}</h5>
                    </div>
                    
                </div>
            </a>
            @endforeach
        </div>
    </div>
    
</div>

@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/main_one.css')}}">
@endsection

@section('script')
<script>
            document.querySelector('.components-me').classList.add('active');
            document.querySelector('.components-me-user').classList.add('collapsed');
            document.querySelector('.components-me-show').classList.add('show');
            document.querySelector('.users-me').classList.add('active');
    </script>
@endsection