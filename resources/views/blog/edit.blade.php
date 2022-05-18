@extends('blog.assembly')

@section('body-content')
<div class="cont-main-blog">
    <div class="cont-editor">
         @include('layout_.nav_editor')
<div class="input-bar" style="display: none">
    <input enctype="multipart/form-data" type="file" id="canera" name="camera"  >
    <input type="hidden" name="post_id" value="{{$post->id}}">
@csrf
</div>

<img src="" alt="">
<div class="icon-image-editor" style="position: absolute; display: none; cursor: pointer; top: 134px; left: 274.5px;">
<div class="icon-image-editor-svg">
<svg  xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="40" height="40" x="0" y="0" viewBox="0 0 455.431 455.431" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
        <path xmlns="http://www.w3.org/2000/svg" style="" d="M405.493,412.764c-69.689,56.889-287.289,56.889-355.556,0c-69.689-56.889-62.578-300.089,0-364.089  s292.978-64,355.556,0S475.182,355.876,405.493,412.764z" fill="#8dc640" data-original="#8dc640"></path>
        <g xmlns="http://www.w3.org/2000/svg" style="opacity:0.2;">
            <path style="" d="M229.138,313.209c-62.578,49.778-132.267,75.378-197.689,76.8   c-48.356-82.489-38.4-283.022,18.489-341.333c51.2-52.622,211.911-62.578,304.356-29.867   C377.049,112.676,330.116,232.142,229.138,313.209z" fill="#ffffff" data-original="#ffffff" class=""></path>
        </g>
        <path xmlns="http://www.w3.org/2000/svg" style="" d="M362.827,227.876c0,14.222-11.378,25.6-25.6,25.6h-85.333v85.333c0,14.222-11.378,25.6-25.6,25.6  c-14.222,0-25.6-11.378-25.6-25.6v-85.333H115.36c-14.222,0-25.6-11.378-25.6-25.6c0-14.222,11.378-25.6,25.6-25.6h85.333v-85.333  c0-14.222,11.378-25.6,25.6-25.6c14.222,0,25.6,11.378,25.6,25.6v85.333h85.333C351.449,202.276,362.827,213.653,362.827,227.876z" fill="#ffffff" data-original="#ffffff" class=""></path>
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

        <div class="edittor-image-bar edittor-image-bar-camera" style="z-index: -1;opacity: 0;display: flex;margin-left: 15px;transition: all 0.5s;position: absolute;left: -110px;">
            <label for='canera' class="editro-image-bar-elemet" style="margin-right: 15px;cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="35" height="35" x="0" y="0" viewBox="0 0 327.6 327.6" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                    <path xmlns="http://www.w3.org/2000/svg" style="" d="M30,67.8h63.2v-9.6c0-12,9.6-21.6,21.6-21.6h98c12,0,21.6,9.6,21.6,21.6v9.6h63.2  c16.4,0,30,13.6,30,30V261c0,16.4-13.6,30-30,30H30c-16.4,0-30-13.6-30-30V97.8C0,81,13.6,67.8,30,67.8z" fill="#4a566e" data-original="#4a566e" class=""></path>
                    <path xmlns="http://www.w3.org/2000/svg" style="" d="M209.2,134.2c-11.6-11.6-27.6-18.4-45.2-18.4s-33.6,7.2-45.2,18.8c-11.6,11.6-18.8,27.6-18.8,45.2  s7.2,33.6,18.8,45.2s27.6,18.8,45.2,18.8s33.6-7.2,45.2-18.8c11.6-11.6,18.8-27.6,18.8-45.2C227.6,161.8,220.4,145.8,209.2,134.2z   M164,99c22,0,42.4,8.8,56.8,23.6c14.4,14.4,23.6,34.8,23.6,56.8s-8.8,42.4-23.6,56.8c-14.4,14.4-34.8,23.6-56.8,23.6  s-42.4-8.8-56.8-23.6c-14.4-14.4-23.6-34.8-23.6-56.8s8.8-42.4,23.6-56.8C121.6,107.8,142,99,164,99z" fill="#00b594" data-original="#00b594" class=""></path>
                    <g xmlns="http://www.w3.org/2000/svg">
                        <circle style="" cx="280.8" cy="114.2" r="16" fill="#ffffff" data-original="#ffffff"></circle>
                        <circle style="" cx="164" cy="179.4" r="44" fill="#ffffff" data-original="#ffffff"></circle>
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
                    </g></svg>              </label>
            <div class="editro-image-bar-elemet editro-image-bar-elemet-vedio">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="35" height="35" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path class="editro-image-bar-elemet-vedio" xmlns="http://www.w3.org/2000/svg" d="m.522 17.874c.49 1.738 1.989 2.056 2.089 2.117 2.467.672 16.295.674 18.799 0 1.715-.496 2.03-2.017 2.089-2.117.653-3.474.696-8.003-.03-11.945l.03.196c-.49-1.738-1.989-2.056-2.089-2.117-2.434-.661-16.298-.686-18.799 0-1.715.497-2.03 2.017-2.089 2.117-.699 3.651-.734 7.84 0 11.749zm9.086-2.223v-7.293l6.266 3.652z" fill="#e53935" data-original="#e53935" class=""></path></g></svg>
            </div>
        </div>

        <input enctype="multipart/form-data" type="file" id="canera" name="camera" style="display: none;" >


    </div>


    <div class="titleandimage" style="display: flex;justify-content: center;align-items: center;margin-top: 20px;">
        <div  class="title-of-writeup" style="height: 39px;padding: 10px;font-size: 25px;border-left: 3px solid #0000005c;width: 675px;overflow: hidden;background: #f4f1f130;font-family: initial;" >
            {{-- <div class="title-of" contenteditable="true" > Title
            </div> --}}
            <input type="text "  class="title-of" placeholder="Title" style="width: 100%;background: transparent;border: none;" value="{{  $post->title  ?? ''}}">
        </div>
        <input type="file" id="mian_image_writeup" style="display: none" name="image-main-writeup">
        <label for="mian_image_writeup" style="margin-left: 52px;padding: 10px;background: #f2534b;color: white;border-radius: 11px;cursor: pointer;"> Choose image</label>
        <div class="image-main-writeup" style="overflow: hidden;width: 100px;height: 100px;background: #ece7e7c4;margin-left: 20px;display: flex;justify-content: center;align-items: center;font-size: 19px;font-weight: bold;">
        @if($post->image()->first())
        <img src="{{ $post->image()->first()->path}}" alt="" style="width: 100%">
        @endif
        </div>
    </div>




        <div class="body_art" contenteditable="true">
            {!!  $post->body  !!}

        </div>
    </div>
    <div class="box_options">
        <div class="sec">
            <div class="icon-box">
                <i class="fa-solid fa-bold iconi" id="bold"></i>
                <i class="fa-solid fa-italic iconi" id="Italic"></i>
                <i class="fa-solid fa-link iconi" id="link"></i>
                <span></span>
                <i class="fa-solid fa-t iconi" id="upper"></i>
                <i class="fa-regular fa-t small- iconi" id="lower"></i>
                <i class="fa-solid fa-quote-left iconi" id="comma"></i>
                <span></span>
                <i class="fa-regular fa-message iconi"></i>
            </div>
            <div class="link_input">
                <input type="text" name="link">
                <button class="add-link"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="25" height="25" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <path xmlns="http://www.w3.org/2000/svg" d="m507.606 4.394c-3.902-3.902-9.632-5.346-14.917-3.761l-458.881 137.665c-20.222 6.066-33.808 24.326-33.808 45.445 0 20.826 13.985 39.367 34.011 45.089l193.789 55.368 55.368 193.789c5.722 20.025 24.263 34.011 45.097 34.011 21.111 0 39.371-13.586 45.438-33.808l137.664-458.882c1.586-5.285.142-11.014-3.761-14.916zm-477.606 179.342c0-7.761 4.994-14.473 12.428-16.703l401.896-120.569-208.756 208.756-193.316-55.233c-7.213-2.062-12.252-8.741-12.252-16.251zm314.968 285.836c-2.23 7.434-8.942 12.428-16.711 12.428-7.503 0-14.182-5.038-16.243-12.252l-55.233-193.316 208.756-208.756z" fill="#ffffff" data-original="#000000" class=""></path>
                        </g>
                    </svg></button>
            </div>
            <strong></strong>

        </div>
    </div>
</div>

@endsection

@section('style')
{{-- add css file of blog  --}}
<link rel="stylesheet" href="{{asset('css/blog.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2{
        width: 100%;
    }

    .main-box-tags{
        width: 100%;
        height: 100%;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ffffffc4;
        z-index: -1;
        transition: all 1s ;
        opacity: 0;
    }
    .box-two-tags{
        width: 500px;
        height: 230px;
        background: #f8f6f6;
        padding: 10px 20px;
        border-radius: 5px;
    }
    .exit-bar{
        width: 100%;
        padding-bottom: 10px;
        border-bottom: 1px solid #00000024;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
    }
    .box-tags{
        width: 100%;
    }
    .select2-selection{
        height: 105px;
        border-color: #00000030;
    }
</style>
@endsection

@section('script')
 {{-- add script of blog  --}}
<script src="{{asset('js/blog.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/others/tags.js')}}"></script>
@endsection


@section('after-body')
<div class="main-box-tags" >
    <div class="box-two-tags">
        <div class="exit-bar" >
            <span> Insert the writeup tags </span>
            <i class="fa-solid fa-times exit-tag" style="color: rgba(0, 0, 0, 0.438);font-size: 20px;cursor: pointer;"></i>
        </div>
        <div class="box-tags"  >
            <select class="form-control" multiple="multiple">
                @foreach ($tags as $tag)

                <option
                @if ($post->tags->contains($tag))
                selected
                @endif
                 >{{ $tag->name }}</option>

                @endforeach

            </select>
        </div>
        <div>
            <div style="margin: 10px;text-align: right;">
                <button class="btn btn-primary ok-tags" style="width: 17%;">Ok</button>
            </div>

        </div>
    </div>
</div>

@endsection
