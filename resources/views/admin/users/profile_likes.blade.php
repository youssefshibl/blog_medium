@extends('admin.users.assembly')

@section('body-content')

<div class="profile-body" style="display: inline-flex;width: 100%;">
    <div class="profile-info-left" style="display: inline-flex;flex-direction: column;border-right: 1px solid #0000002e;margin: 50px 25px 30px 120px;padding-right: 20px;">
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.showprofile' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Infomation</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.lists' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Lists</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.posts' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Posts</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.likes.show' , ['username'=> $user->name])}}" style="text-decoration: none;">Likes</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.comments.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Comments</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.following')}}" style="text-decoration: none;color: unset;">Following</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('profile.followers')}}" style="text-decoration: none;color: unset;">Followers</a></span>


    </div>
    <div class="profile-right"style="margin-top: 50px;width: 70%;">
            @foreach ($posts as $post)
                <div class="box-post">
                    <div class="box-title">
                        <div class="box-image">
                            <img src="{{ $post->user->image->path ?? '/image/me.jpg' }}" alt="">
                        </div>
                        <span><a href="{{route('profile' , ['username' => $post->user->name])}}" style="text-decoration: none;color: rgba(32, 32, 32, 0.795)">{{ $post->user->name}}</a></span>
                        <span>{{$post->time_ago}}</span>
                    </div>
                    <div class="box-body">
                        <a href="{{route('admin.post.show' , ['post' => $post->id])}}">
                            <div class="box-body-lef">
                                <div class="title">{{$post->title}}</div>
                                <div class="body">{{ $post->body}}</div>
                            </div>
                            <div class="box-body-right">
                                @if (!empty($post->image->path))
                                <img src="{{ $post->image->path }}" alt="">
                                @else
                                <img src="{{ asset('image/me.jpg') }}" alt="">
                                @endif

                            </div>
                        </a>

                    </div>
                    <div class="box-footer">
                        <div class="box-footer-left">
                            <span>Algorithms</span>
                            <span>2 min read</span>
                            <span>Based on your reading history</span>
                        </div>
                        <div class="box-footer-right">




                                        <span class="options" style="position: relative;">
                                            <svg class="bk od oe option-icon" data-option-id="{{$post->id}}" width="25" height="25" style="cursor: pointer;">
                                                <path d="M5 12.5c0 .55.2 1.02.59 1.41.39.4.86.59 1.41.59.55 0 1.02-.2 1.41-.59.4-.39.59-.86.59-1.41 0-.55-.2-1.02-.59-1.41A1.93 1.93 0 0 0 7 10.5c-.55 0-1.02.2-1.41.59-.4.39-.59.86-.59 1.41zm5.62 0c0 .55.2 1.02.58 1.41.4.4.87.59 1.42.59.55 0 1.02-.2 1.41-.59.4-.39.59-.86.59-1.41 0-.55-.2-1.02-.59-1.41a1.93 1.93 0 0 0-1.41-.59c-.55 0-1.03.2-1.42.59-.39.39-.58.86-.58 1.41zm5.6 0c0 .55.2 1.02.58 1.41.4.4.87.59 1.43.59.56 0 1.03-.2 1.42-.59.39-.39.58-.86.58-1.41 0-.55-.2-1.02-.58-1.41a1.93 1.93 0 0 0-1.42-.59c-.56 0-1.04.2-1.43.59-.39.39-.58.86-.58 1.41z" fill-rule="evenodd"></path>
                                            </svg>
                                            <div class="options-list option-list-display-{{$post->id}}" style="background: white;border: 1px solid #0000002e;text-align: center;border-radius: 5px;padding: 5px 5px;position: absolute;bottom: 29px;right: -61px;display: none">
                                                <ul style="list-style: none;padding: 0px;margin: 0px;">

                                                    <form action="{{route('admin.post.delete',['post'=> $post->id ])}}" id="delet-post-{{$post->id}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="{{$post->id}}">
                                                    </form>
                                                    <li style="padding: 4px 24px;" class="option-icon-list"><a href="{{route('posts.destroy',['post'=> $post->id ])}}" onclick="event.preventDefault();
                                                        document.getElementById('delet-post-{{$post->id}}').submit();" style="text-decoration: none;color: unset">Delet</a> </li>

                                                </ul>
                                            </div>
                                        </span>
                        </div>
                    </div>
                </div>
        @endforeach
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
