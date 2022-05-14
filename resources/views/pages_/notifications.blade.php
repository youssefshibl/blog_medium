
{{-- @extends('layout_.assembly') --}}
@extends('pages_.assembly')

@section('body-content')
{{-- <h1>{{__('messages.welcome')}}</h1> --}}
<div class="middle_body">

    <div class="notification-list" style="padding: 5px;margin-top: 5px;margin-bottom: 5px;"  >
       @foreach ($notifications as $not)
       <a
       @if($not['type'] == 'like')
       href="{{route('posts.show' , ['post' => $not['post_id']])}}"
       @elseif($not['type'] == 'comment')

       href="{{route('posts.comments.index' , ['post' => $not['post_id']]) }}"

       @endif
        style="text-decoration: none;color: unset;" >
        <div class="notification-list-one" style="display: flex;margin-top: 10px;margin-bottom: 10px;position: relative;top: 0px;left: 0px;bottom: 0px;right: 0px;align-items: center;padding: 10px 10px;background: #f2f2f2;border-radius: 5px;">
                <div class="box-image-not" style="width: 40px;height: 40px;border-radius: 20px;overflow: hidden;margin-right: 25px;">
                    <img src="{{$not['image_url'] ?? asset('image/me.jpg')}}" alt="" style="width: 100%;">
                </div>
                <p style="font-size: 15px;margin-bottom: 0px;width: 78%;" >{{ $not['name']}} make {{ $not['type']}} to "{{ $not['post_title']}}"</p>
                <div class="data" style="position: absolute;color: #00000042;top: 16px;right: 16px;" >
                    <p>{{ $not['time']}}</p>
                </div>
            </div>
         </a>
       @endforeach
    </div>
</div>
@endsection
