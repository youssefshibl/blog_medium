@extends('pages_.assembly')

@section('body-content')

<div class="middle_body">

    <div class="div">
        <span class="hid">Your lists</span>
        <span class="span make-new-list" style="text-decoration: none;color: white;background-color: #3C6382;padding: 7px 34px;border-radius: 19px;font-weight: bold;cursor: pointer;">New list</span>
    </div>
    <div class="list_main_bar">
        <span>Saved</span>
        <span class="activ-list-main-bar">Highlights</span>
        <span>Recently viewed</span>
    </div>
    <div class="list-main">
        <div class="list-main-one">
            <div class="title">Create a list to easily organize and share stories</div>
            <div class="icon"><svg width="283" height="174" viewBox="0 0 283 174" fill="none">
                    <circle opacity="0.15" cx="141.5" cy="87.5" r="141.5" fill="#E8F3E8"></circle>
                    <a class="make-new-list"><circle cx="141.5" cy="87.5" r="29.5" fill="#fff"></circle></a>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M148.71 74.32a.66.66 0 0 1 1.31.07v3.28h3.28a.66.66 0 1 1 0 1.3h-3.28v3.29a.66.66 0 1 1-1.3 0v-3.28h-3.29a.66.66 0 0 1 0-1.31h3.28v-3.28-.07zm-13.77 4c-.72 0-1.3.59-1.3 1.31v17.68l7.46-5.74a.66.66 0 0 1 .8 0l7.47 5.74V87.5a.66.66 0 1 1 1.3 0v11.14a.66.66 0 0 1-1.05.52l-8.12-6.24-8.12 6.24a.65.65 0 0 1-1.06-.52v-19a2.62 2.62 0 0 1 2.62-2.63h5.25a.66.66 0 0 1 0 1.31h-5.25z" fill="#0F730C"></path>
                </svg></div>
        </div>
        @foreach($lists as $list)
        <div class="list-main-number">
            <div class="list-left">
                <div class="title" style="margin-left: 25px;">{{ $list->name}}</div>
                <div class="buttom-list">
                    <a href="{{route('showlist' , ['list_name'=> $list->name])}}" style="text-decoration: none;color: white;margin-top: 20px;margin-left: 20px;padding: 10px 20px;text-align: center;background: #3C6382;color: white;border-radius: 5px;cursor: pointer;">View list</a>
                    <div class="delet-list" data-title="{{ $list->name}}">Delet List</div>
                    <div class="numer_of_writeup" style="margin-top: 27px;margin-left: 20px;text-align: center;border-radius: 5px;color: #00000096;font-weight: 600;font-size: 22px;">{{auth()->user()->posts()->where('list_id' , $list->id)->count()}} WriteUp</div>
                </div>

            </div>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="150" height="150" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m160 24h256a32 32 0 0 1 32 32v32a0 0 0 0 1 0 0h-288a0 0 0 0 1 0 0v-64a0 0 0 0 1 0 0z" fill="#dadcde" data-original="#dadcde"></path><path xmlns="http://www.w3.org/2000/svg" d="m416 24h-320a32 32 0 0 0 -32 32v432h320v-432a32 32 0 0 1 32-32z" fill="#e9eef2" data-original="#e9eef2" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m144 312h48v112h-48z" fill="#e6be34" transform="matrix(0 1 -1 0 536 200)" data-original="#e6be34" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m112 88h80v64h-80z" fill="#c3c6c7" data-original="#c3c6c7"></path><path xmlns="http://www.w3.org/2000/svg" d="m272 96h-32a8 8 0 0 1 0-16h32a8 8 0 0 1 0 16z" fill="#dadcde" data-original="#dadcde"></path><path xmlns="http://www.w3.org/2000/svg" d="m336 128h-112a8 8 0 0 1 0-16h112a8 8 0 0 1 0 16z" fill="#dadcde" data-original="#dadcde"></path><path xmlns="http://www.w3.org/2000/svg" d="m256 160h-32a8 8 0 0 1 0-16h32a8 8 0 0 1 0 16z" fill="#e6be34" data-original="#e6be34" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m144 192h-16a8 8 0 0 1 0-16h16a8 8 0 0 1 0 16z" fill="#e6be34" data-original="#e6be34" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m336 192h-160a8 8 0 0 1 0-16h160a8 8 0 0 1 0 16z" fill="#e6be34" data-original="#e6be34" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m112 216h224v64h-224z" fill="#c3c6c7" data-original="#c3c6c7"></path><path xmlns="http://www.w3.org/2000/svg" d="m336 96h-32a8 8 0 0 1 0-16h32a8 8 0 0 1 0 16z" fill="#dadcde" data-original="#dadcde"></path><path xmlns="http://www.w3.org/2000/svg" d="m336 160h-48a8 8 0 0 1 0-16h48a8 8 0 0 1 0 16z" fill="#e6be34" data-original="#e6be34" class=""></path><g xmlns="http://www.w3.org/2000/svg" fill="#dadcde"><path d="m176 320h-48a8 8 0 0 1 0-16h48a8 8 0 0 1 0 16z" fill="#dadcde" data-original="#dadcde"></path><path d="m336 320h-128a8 8 0 0 1 0-16h128a8 8 0 0 1 0 16z" fill="#dadcde" data-original="#dadcde"></path><path d="m336 432h-224a8 8 0 0 1 0-16h224a8 8 0 0 1 0 16z" fill="#dadcde" data-original="#dadcde"></path></g><path xmlns="http://www.w3.org/2000/svg" d="m232 392h-40l72-80 24 24z" fill="#ffd33a" data-original="#ffd33a"></path><path xmlns="http://www.w3.org/2000/svg" d="m439.515 183.515-23.03-23.03a28.969 28.969 0 0 0 -20.485-8.485 28.969 28.969 0 0 0 -20.485 8.485l-127.515 127.515-16 56 24 24 56-16 127.515-127.515a28.971 28.971 0 0 0 0-40.97z" fill="#6a7073" data-original="#6a7073"></path><path xmlns="http://www.w3.org/2000/svg" d="m265.088 238.745h101.823v90.51h-101.823z" fill="#ffd33a" transform="matrix(.707 -.707 .707 .707 -108.264 306.627)" data-original="#ffd33a"></path><path xmlns="http://www.w3.org/2000/svg" d="m320.402 223.029h79.196v33.941h-79.196z" fill="#e6be34" transform="matrix(.707 -.707 .707 .707 -64.264 324.853)" data-original="#e6be34" class=""></path></g></svg>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
