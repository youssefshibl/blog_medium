@extends('admin.posts.assembly')

@section('content')

    <div class="search-form-users">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0  navbar-search" style="width: 400px !important;" action="{{ route('admin.posts.search')}}">
            <div class="input-group">
            <input name="search" type="text" style="background-color: white !important;" class="form-control bg-light border-0 small" placeholder="Search for posts" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            </div>
        </form>
    </div>
    @if (session('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 20px">
        {{ session('success') }}
    </div>
   @endif
    <div class="profile-right" style="margin-top: 50px;width: 80%;margin-left: auto;margin-right: auto;">
        @foreach ($posts as $post)
            <div class="box-post">
                <div class="box-title">
                    <div class="box-image">
                        <img src="{{ $post->user->image->path ?? '/image/me.jpg' }}" alt="">
                    </div>
                    <span><a href="{{ route('admin.users.showprofile' , ['id'=> $post->user_id])}}" style="text-decoration: none;color: rgba(32, 32, 32, 0.795)">{{ $post->user->name}}</a></span>
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

    <div class="pag" style="margin-left: 58px;margin-top: 30px;" >
        {!! $posts->withQueryString()->links() !!}
      </div>


     @endsection

@section('script')
<script>
            document.querySelector('.components-me').classList.add('active');
            document.querySelector('.components-me-user').classList.add('collapsed');
            document.querySelector('.components-me-show').classList.add('show');
            document.querySelector('.post-me').classList.add('active');
    </script>
@endsection