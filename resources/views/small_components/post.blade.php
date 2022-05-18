

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
            @foreach ($post->tags()->limit(3)->get() as $tag)
                <span class="tag-name">
                    <a href="{{ route('tags' , ['tag'=> $tag->name])}}" style="text-decoration: none;color: unset">
                        {{ $tag->name}}
                    </a>
                </span>
                @endforeach
            <span>2 min read</span>
            <span>Based on your reading history</span>
        </div>

    </div>
</div>
@endforeach
