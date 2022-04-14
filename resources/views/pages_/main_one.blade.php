
{{-- @extends('layout_.assembly') --}}
@extends('pages_.assembly')

@section('body-content')
<div class="middle_body">

    @if (Auth::user()->verified == 0)
    <div class="alert alert-danger">
        <h5>Please verify your email</h5>
        </div>
    @endif
    @foreach ($posts as $post)
    <div class="box-post">
        <div class="box-title">
            <div class="box-image">
                <img src="{{ $post->user->image->path ?? '/image/me.jpg' }}" alt="">
            </div>
            <span><a href="" style="text-decoration: none;color: rgba(32, 32, 32, 0.795)">{{ $post->user->name}}</a></span>
            <span>{{$post->time_ago}}</span>
        </div>
        <div class="box-body">
            <a href="{{route('posts.show' , ['post' => $post->id])}}">
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

                            @if(!empty($array_posts_save))
                                    @if (in_array($post->id , $array_posts_save))
                                    <svg class='saved-post' style="cursor: pointer;" width="24" height="24" viewBox="0 0 24 24" fill="none" class="vt"><path class="saved-post" data-post_number="{{ $post->id }}" d="M7.5 3.75a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-14a2 2 0 0 0-2-2h-9z" fill="#000"></path></svg>

                                    @else
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" class="oc" style="cursor: pointer;">
                                        <path  d="M18 2.5a.5.5 0 0 1 1 0V5h2.5a.5.5 0 0 1 0 1H19v2.5a.5.5 0 1 1-1 0V6h-2.5a.5.5 0 0 1 0-1H18V2.5zM7 7a1 1 0 0 1 1-1h3.5a.5.5 0 0 0 0-1H8a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V7z" fill="#292929"></path>
                                    </svg>

                                    @endif
                            @else
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" class="oc" style="cursor: pointer;">
                                    <path d="M18 2.5a.5.5 0 0 1 1 0V5h2.5a.5.5 0 0 1 0 1H19v2.5a.5.5 0 1 1-1 0V6h-2.5a.5.5 0 0 1 0-1H18V2.5zM7 7a1 1 0 0 1 1-1h3.5a.5.5 0 0 0 0-1H8a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V7z" fill="#292929"></path>
                                </svg>
                            @endif


                <svg class="bk od oe" width="25" height="25" style="cursor: pointer;">
                    <path d="M5 12.5c0 .55.2 1.02.59 1.41.39.4.86.59 1.41.59.55 0 1.02-.2 1.41-.59.4-.39.59-.86.59-1.41 0-.55-.2-1.02-.59-1.41A1.93 1.93 0 0 0 7 10.5c-.55 0-1.02.2-1.41.59-.4.39-.59.86-.59 1.41zm5.62 0c0 .55.2 1.02.58 1.41.4.4.87.59 1.42.59.55 0 1.02-.2 1.41-.59.4-.39.59-.86.59-1.41 0-.55-.2-1.02-.59-1.41a1.93 1.93 0 0 0-1.41-.59c-.55 0-1.03.2-1.42.59-.39.39-.58.86-.58 1.41zm5.6 0c0 .55.2 1.02.58 1.41.4.4.87.59 1.43.59.56 0 1.03-.2 1.42-.59.39-.39.58-.86.58-1.41 0-.55-.2-1.02-.58-1.41a1.93 1.93 0 0 0-1.42-.59c-.56 0-1.04.2-1.43.59-.39.39-.58.86-.58 1.41z" fill-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

