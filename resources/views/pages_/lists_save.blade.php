@extends('pages_.assembly')

@section('body-content')
<div class="middle_body" style="border-top: none;">
    <div class="title-general" style="font-size: 30px;font-weight: bold;padding-bottom: 30px;border-bottom: 1px solid #0000004f;margin-bottom: 30px;">
        Save Posts
    </div>
    <div class="container-lists-save" style="display: flex;flex-wrap: wrap;">
        @foreach ($lists as $list)
            <div class="list-card" style="margin: 10px;padding: 10px 20px;background: #f2f2f2;min-width: 160px;cursor: pointer;position: relative;border-radius: 5px;">
                <div class="exit" style="position: absolute;right: -9px;top: -15px;font-size: 22px;color: #4073c8;"><i class="fa-solid fa-circle-xmark delet_save_list" data-save_list_name="{{$list->name}}"></i></div>
                <a href="{{route('posts.in.save' , ['list' => $list->name])}}" style="color: unset;text-decoration: none;">

                <div class="icon" style="text-align: center;padding-top: 20px;padding-bottom: 30px;">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="50" height="50" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m12 51h-7a1 1 0 0 1 -1-1v-48a1 1 0 0 1 1-1h24.76a3.015 3.015 0 0 1 2.12.88l3.12 3.12z" fill="#d6dbe3" data-original="#d6dbe3" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m20 55h-7a1 1 0 0 1 -1-1v-48a1 1 0 0 1 1-1h24.76a3.015 3.015 0 0 1 2.12.88l3.12 3.12z" fill="#b9bfcc" data-original="#b9bfcc" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m56 19.243v38.757a1 1 0 0 1 -1 1h-34a1 1 0 0 1 -1-1v-48a1 1 0 0 1 1-1h24.757a3 3 0 0 1 2.122.879l7.242 7.242a3 3 0 0 1 .879 2.122z" fill="#d6dbe3" data-original="#d6dbe3" class=""></path><rect xmlns="http://www.w3.org/2000/svg" fill="#0c70dc" height="4" rx="1" width="6" x="25" y="14" data-original="#0c70dc"></rect><rect xmlns="http://www.w3.org/2000/svg" fill="#2783ec" height="4" rx="1" width="6" x="32" y="22" data-original="#2783ec" class=""></rect><rect xmlns="http://www.w3.org/2000/svg" fill="#25a3da" height="4" rx="1" width="6" x="39" y="30" data-original="#25a3da"></rect><rect xmlns="http://www.w3.org/2000/svg" fill="#2bb6e8" height="4" rx="1" width="6" x="46" y="38" data-original="#2bb6e8"></rect><path xmlns="http://www.w3.org/2000/svg" d="m55.73 18h-7.73a1 1 0 0 1 -1-1v-7.72a2.869 2.869 0 0 1 .88.6l7.24 7.24a3.091 3.091 0 0 1 .61.88z" fill="#b9bfcc" data-original="#b9bfcc" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m38 16v-1a2 2 0 0 0 -2-2h-1a1 1 0 0 0 0 2h1v1a1 1 0 0 0 -.707 1.707l1 1a1 1 0 0 0 1.414 0l1-1a1 1 0 0 0 -.707-1.707z" fill="#439af6" data-original="#439af6"></path><path xmlns="http://www.w3.org/2000/svg" d="m45 24v-1a2 2 0 0 0 -2-2h-1a1 1 0 0 0 0 2h1v1a1 1 0 0 0 -.707 1.707l1 1a1 1 0 0 0 1.414 0l1-1a1 1 0 0 0 -.707-1.707z" fill="#439af6" data-original="#439af6"></path><path xmlns="http://www.w3.org/2000/svg" d="m52.707 32.293a1 1 0 0 0 -.707-.293v-1a2 2 0 0 0 -2-2h-1a1 1 0 0 0 0 2h1v1a1 1 0 0 0 -.707 1.707l1 1a1 1 0 0 0 1.414 0l1-1a1 1 0 0 0 0-1.414z" fill="#439af6" data-original="#439af6"></path><g xmlns="http://www.w3.org/2000/svg" fill="#8991a0"><path d="m26 47h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2z" fill="#8991a0" data-original="#8991a0"></path><path d="m51 47h-21a1 1 0 0 1 0-2h21a1 1 0 0 1 0 2z" fill="#8991a0" data-original="#8991a0"></path><path d="m26 51h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2z" fill="#8991a0" data-original="#8991a0"></path><path d="m51 51h-21a1 1 0 0 1 0-2h21a1 1 0 0 1 0 2z" fill="#8991a0" data-original="#8991a0"></path><path d="m26 55h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2z" fill="#8991a0" data-original="#8991a0"></path><path d="m12 39h-3a1 1 0 0 1 0-2h3z" fill="#8991a0" data-original="#8991a0"></path><path d="m12 43h-3a1 1 0 0 1 0-2h3z" fill="#8991a0" data-original="#8991a0"></path><path d="m12 47h-3a1 1 0 0 1 0-2h3z" fill="#8991a0" data-original="#8991a0"></path></g><path xmlns="http://www.w3.org/2000/svg" d="m20 43h-3a1 1 0 0 1 0-2h3z" fill="#79808f" data-original="#79808f"></path><path xmlns="http://www.w3.org/2000/svg" d="m20 47h-3a1 1 0 0 1 0-2h3z" fill="#79808f" data-original="#79808f"></path><path xmlns="http://www.w3.org/2000/svg" d="m20 51h-3a1 1 0 0 1 0-2h3z" fill="#79808f" data-original="#79808f"></path><path xmlns="http://www.w3.org/2000/svg" d="m51 55h-21a1 1 0 0 1 0-2h21a1 1 0 0 1 0 2z" fill="#8991a0" data-original="#8991a0"></path></g></svg>        </div>
                <div class="card-titl" style="text-align: center;font-size: 17px;">
                    {{$list->name}}
                </div>
                <div class="writeup-number-in-list" style="padding-top: 20px;font-style: italic;">
                    {{$list->postsInSave()->count()}} WriteUp
                </div>
            </a>

            </div>
        @endforeach
        <div class="list-card" style="margin: 10px;padding: 10px 20px;background: #f2f2f2;min-width: 160px;cursor: pointer;position: relative;border-radius: 5px;">
            <div class="icon" style="text-align: center;margin-top: 20px;margin-bottom: 30px;">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="50" height="50" x="0" y="0" viewBox="0 0 152 152" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><linearGradient xmlns="http://www.w3.org/2000/svg" id="linear-gradient" gradientUnits="userSpaceOnUse" x1="55.59" x2="141.69" y1="55.35" y2="141.45"><stop stop-opacity="1" stop-color="#b71c1c" offset="0"></stop><stop stop-opacity="1" stop-color="#2b1cb7" offset="0"></stop><stop stop-opacity="1" stop-color="#2b1cb7" offset="1"></stop></linearGradient><g xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2"><g id="_01.Add" data-name="01.Add"><rect fill="#4073c8" height="152" rx="35" width="152" data-original="#f44336" class=""></rect><path d="m152 111v5.54a35.61 35.61 0 0 1 -35.5 35.46h-4.76l-39.18-39.18a6.6 6.6 0 0 1 -2.39-2.39l-28.84-28.84a6.78 6.78 0 0 1 3.46-12.59h23.07a1.34 1.34 0 0 0 1.35-1.35v-23.1a6.78 6.78 0 0 1 11.79-4.55l30.55 30.56-.22-.16c.14.11.29.23.42.35a3.33 3.33 0 0 1 .46.46z" fill="url(#linear-gradient)" data-original="url(#linear-gradient)"></path><path id="_Path_" d="m114 75.76a6.79 6.79 0 0 1 -6.79 6.79h-23.07a1.34 1.34 0 0 0 -1.35 1.35v23.1a6.79 6.79 0 0 1 -13.58 0v-23.1a1.34 1.34 0 0 0 -1.35-1.35h-23.07a6.79 6.79 0 1 1 0-13.58h23.07a1.34 1.34 0 0 0 1.35-1.35v-23.07a6.79 6.79 0 0 1 13.58 0v23.07a1.34 1.34 0 0 0 1.35 1.38h23.07a6.79 6.79 0 0 1 6.79 6.76z" fill="#ffffff" data-original="#ffffff" class=""></path></g></g></g></svg>
            </div>
            <div class="creat-list" style="font-size: 30px;text-align: center;font-weight: bold;color: #636b6f;">
                New
            </div>
        </div>
    </div>
</div>
@endsection
