@extends('admin.users.assembly')
@section('body-content')
<div class="profile-body" style="display: inline-flex;width: 100%;">
    <div class="profile-info-left" style="display: inline-flex;flex-direction: column;border-right: 1px solid #0000002e;margin: 50px 25px 30px 120px;padding-right: 20px;">
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.showprofile' , ['id'=> $user->id])}}" style="text-decoration: none;">Infomation</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.lists' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Lists</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.posts' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Posts</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.likes.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Likes</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.comments.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Comments</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.following')}}" style="text-decoration: none;color: unset;">Following</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.followers')}}" style="text-decoration: none;color: unset;">Followers</a></span>




    </div>
    <div class="information" style="width: 100%;margin-top: 50px;">
        <div class="proprity" style="margin-bottom: 20px;">
            <div class="name-of-it" style="font-size: 20px;font-weight: bold;">
                Name
            </div>
            <div class="value-of-it" style="margin-left: 20px;color: #3960cf;padding-left: 10px;border-left: 6px solid #264ec136;border-top-left-radius: 4px;border-bottom-left-radius: 4px;">
                {{$user->name}}
            </div>
        </div>
        <div class="proprity" style="margin-bottom: 20px;">
            <div class="name-of-it" style="font-size: 20px;font-weight: bold;">
                Email
            </div>
            <div class="value-of-it" style="margin-left: 20px;color: #3960cf;padding-left: 10px;border-left: 6px solid #264ec136;border-top-left-radius: 4px;border-bottom-left-radius: 4px;">
                {{$user->email}}
            </div>
        </div>
        <div class="proprity" style="margin-bottom: 20px;">
            <div class="name-of-it" style="font-size: 20px;font-weight: bold;">
                Phone
            </div>
            <div class="value-of-it" style="margin-left: 20px;color: #3960cf;padding-left: 10px;border-left: 6px solid #264ec136;border-top-left-radius: 4px;border-bottom-left-radius: 4px;">

                @if ($user->phone)
                {{$user->phone}}
               @else
                    <span style="color: #e74a3b;">Not set</span>
                @endif
            </div>
        </div>
        <div class="proprity" style="margin-bottom: 20px;">
            <div class="name-of-it" style="font-size: 20px;font-weight: bold;">
                Address
            </div>
            <div class="value-of-it" style="margin-left: 20px;color: #3960cf;padding-left: 10px;border-left: 6px solid #264ec136;border-top-left-radius: 4px;border-bottom-left-radius: 4px;">
                @if ($user->address)
                    {{$user->address}}
                @else
                    <span style="color: #e74a3b;">Not set</span>
                @endif
            </div>
        </div>
            <div class="proprity" style="margin-bottom: 20px;">
                <div class="name-of-it" style="font-size: 20px;font-weight: bold;">
                    Language
                </div>
                <div class="value-of-it" style="margin-left: 20px;color: #3960cf;padding-left: 10px;border-left: 6px solid #264ec136;border-top-left-radius: 4px;border-bottom-left-radius: 4px;">

                    @if ($user->lange)
                    {{$user->lange}}
                     @else
                        <span style="color: #e74a3b;">Not set</span>
                    @endif
                </div>
            </div>
            <div class="proprity" style="margin-bottom: 20px;">
                <div class="name-of-it" style="font-size: 20px;font-weight: bold;">
                    Premium
                </div>
                <div class="value-of-it" style="margin-left: 20px;color: #3960cf;padding-left: 10px;border-left: 6px solid #264ec136;border-top-left-radius: 4px;border-bottom-left-radius: 4px;">

                    @if ($user->Premium == 1)
                        <span style="color: #e74a3b;">Premium</span>
                     @else
                        <span style="color: #e74a3b;">Normal</span>
                    @endif
                </div>
            </div>

    </div>

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
