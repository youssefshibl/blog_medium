@extends('admin.users.assembly')

@section('body-content')

<div class="profile-body" style="display: inline-flex;width: 100%;">
    <div class="profile-info-left" style="display: inline-flex;flex-direction: column;border-right: 1px solid #0000002e;margin: 50px 25px 30px 120px;padding-right: 20px;">
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.showprofile' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Infomation</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.lists' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Lists</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.posts' , ['id'=> $user->id])}}" style="text-decoration: none;">Posts</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.likes.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Likes</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.comments.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Comments</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.following.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Following</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.followers.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Followers</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.savelists.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Save lists</a></span>


    </div>
        <div class="profile-right"style="margin-top: 50px;width: 70%;">
            <div class="middle_body" style="  border: none;margin-top: 0px;">
                {{-- icons for comment and clap  --}}
                <div class="box-title-gen" style="display: flex;justify-content: space-between;">
                    <div class="box-title" style="display: flex;align-items: center;margin-bottom: 20px;">
                        <div class="box-image">
                            <img src="{{ $user->image->path ?? '/image/me.jpg' }}" alt="">
                        </div>
                        <span><a href="{{ route('admin.users.showprofile' , ['id'=> $user->id])}}" style="text-decoration: none;color: rgba(32, 32, 32, 0.795)">{{ $post->user->name}}</a></span>
                        <span>{{  $post->date }}</span>
                        <a style="text-decoration: none;margin-left: 30px;background: #92c14d;color: white;padding: 2px 18px;border-radius: 5px;"
                         href="{{route('posts.destroy',['post'=> $post->id ])}}" onclick="event.preventDefault();
                            document.getElementById('delet-post-{{$post->id}}').submit();" style="text-decoration: none;color: unset">Delet</a>
                    </div>
                    <form action="{{route('admin.post.delete',['post'=> $post->id ])}}" id="delet-post-{{$post->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="{{$post->id}}">
                    </form>

                    <div>
                        <a href="{{route('pdf.index' , ['id'=> $post->id])}}" style="text-decoration: none; color: unset" target="blank">
                            <div class="pdf-box" style="background: #fd483d;padding: 5px 10px;border-radius: 5px;">

                                <span style="color: white;">{{__('messages.download pdf')}} </span>
                            </div>
                        </a>
                    </div>



                </div>

                    <div class="comment-couple" data-post-id="{{$post->id}}" style="position: fixed;display: flex;bottom: 9px;background: white;padding: 5px 33px;justify-content: center;border-radius: 28px;left: 75%;border: 2px solid #0000004a;z-index: 1;">


                            <a href="{{route('admin.posts.comments' , ['post_id' => $post->id]) }}">
                                <div class="cc-icon" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="40" height="40" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10,25.465h13c0.553,0,1-0.448,1-1s-0.447-1-1-1H10c-0.553,0-1,0.448-1,1S9.447,25.465,10,25.465z" fill="#000000" data-original="#000000" class=""></path>
                                            <path d="M36,29.465H10c-0.553,0-1,0.448-1,1s0.447,1,1,1h26c0.553,0,1-0.448,1-1S36.553,29.465,36,29.465z" fill="#000000" data-original="#000000" class=""></path>
                                            <path d="M36,35.465H10c-0.553,0-1,0.448-1,1s0.447,1,1,1h26c0.553,0,1-0.448,1-1S36.553,35.465,36,35.465z" fill="#000000" data-original="#000000" class=""></path>
                                            <path d="M54.072,2.535L19.93,2.465c-3.27,0-5.93,2.66-5.93,5.93v5.124l-8.07,0.017c-3.27,0-5.93,2.66-5.93,5.93v21.141   c0,3.27,2.66,5.929,5.93,5.929H12v10c0,0.413,0.254,0.784,0.64,0.933c0.117,0.045,0.239,0.067,0.36,0.067   c0.276,0,0.547-0.115,0.74-0.327l9.704-10.675l16.626-0.068c3.27,0,5.93-2.66,5.93-5.929v-0.113l5.26,5.786   c0.193,0.212,0.464,0.327,0.74,0.327c0.121,0,0.243-0.022,0.36-0.067c0.386-0.149,0.64-0.52,0.64-0.933v-10h1.07   c3.27,0,5.93-2.66,5.93-5.929V8.465C60,5.196,57.341,2.536,54.072,2.535z M44,40.536c0,2.167-1.763,3.929-3.934,3.929l-17.07,0.07   c-0.28,0.001-0.548,0.12-0.736,0.327L14,53.949v-8.414c0-0.552-0.447-1-1-1H5.93c-2.167,0-3.93-1.763-3.93-3.929V19.465   c0-2.167,1.763-3.93,3.932-3.93l9.068-0.019c0,0,0,0,0,0c0.001,0,0.001,0,0.002,0l25.068-0.052c2.167,0,3.93,1.763,3.93,3.93   v18.441V40.536z M58,29.606c0,2.167-1.763,3.929-3.93,3.929H52c-0.553,0-1,0.448-1,1v8.414l-5-5.5V19.395   c0-3.27-2.66-5.93-5.932-5.93L16,13.514v-5.12c0-2.167,1.763-3.93,3.928-3.93l34.141,0.07c0.001,0,0.001,0,0.002,0   c2.167,0,3.93,1.763,3.93,3.93V29.606z" fill="#000000" data-original="#000000" class=""></path>
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                        </g>
                                        </g></svg>
                                </div>
                            </a>
                    </div>

                <div class="cont-editor">
                   <div class="body_art" contenteditable="false">
                        @if (session('unauthorized-post'))
                        <div class="alert alert-danger">
                            <h5>{{session('unauthorized-post')}}</h5>
                        </div>
                        @endif
                        @isset($post->image->path)
                        <div class="image-main" style="text-align: center;height: 400px;overflow: hidden;">
                        <img src="{{$post->image->path }}" alt="" style="height: 100%;">
                        </div>
                        @endisset

                       <h1 style="padding-bottom: 20px;border-bottom: 1px solid #0000002e;" >{{ $post->title}}
                       @if ($post->user_id == auth()->user()->id)
                       <a href="{{route('posts.edit' , ['post'=> $post->id])}}"><i style="margin-left: 30px;cursor: pointer;color: #006c87;" class="fa-solid fa-pen-to-square"></i></a>
                       @endif
                       </h1>

                     {!!  $post->body  !!}
                   </div>
               </div>
            </div>
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
