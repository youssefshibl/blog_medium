@extends('pages_.assembly')

@section('body-content')

<div class="middle_body">
    <div class="creat-writeup" style="width: 100%;display: inline-flex;justify-content: space-between;align-items: center;padding-bottom: 30px;border-bottom: 1px solid #0000003d;">
        <div class="creat-title" style="font-size: 30px;font-weight: bold;">Creat New writeup</div>
        <form action="" style="width: 50%;">

            <select name="list" id=""style="padding-left: 10px;width: 50%;height: 25px;background: white;border: 1px solid green;border-radius: 5px;">
                @foreach($lists as $list)
                <option value="{{$list->name}}">{{$list->name}}</option>
                @endforeach
            </select>

            <button class="" style="margin-left: 34px;padding: 5px 46px;color: white;background: green;border: none;border-radius: 16px;margin-right: 0px;">Write</button>
        </form>
    </div>
    <div class="div">
        <span class="hid">Your lists</span>
        <span class="span make-new-list" style="text-decoration: none;color: white;background-color: #3C6382;padding: 7px 34px;border-radius: 19px;font-weight: bold;">New list</span>
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
                    <circle cx="141.5" cy="87.5" r="29.5" fill="#fff"></circle>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M148.71 74.32a.66.66 0 0 1 1.31.07v3.28h3.28a.66.66 0 1 1 0 1.3h-3.28v3.29a.66.66 0 1 1-1.3 0v-3.28h-3.29a.66.66 0 0 1 0-1.31h3.28v-3.28-.07zm-13.77 4c-.72 0-1.3.59-1.3 1.31v17.68l7.46-5.74a.66.66 0 0 1 .8 0l7.47 5.74V87.5a.66.66 0 1 1 1.3 0v11.14a.66.66 0 0 1-1.05.52l-8.12-6.24-8.12 6.24a.65.65 0 0 1-1.06-.52v-19a2.62 2.62 0 0 1 2.62-2.63h5.25a.66.66 0 0 1 0 1.31h-5.25z" fill="#0F730C"></path>
                </svg></div>
        </div>
        @foreach($lists as $list)
        <div class="list-main-number">
            <div class="list-left">
                <div class="title" style="margin-left: 25px;">{{ $list->name}}</div>
                <div class="buttom-list">
                    <div class="view-list">View list</div>
                <div class="delet-list" data-title="{{ $list->name}}">Delet List</div>
                </div>
               
            </div>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="150" height="150" x="0" y="0" viewBox="0 0 470 386" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                    <g>
                        <path xmlns="http://www.w3.org/2000/svg" d="m28.428 356h413.144c15.7 0 28.428-13.92 28.428-36.669v-290.919c0-15.691-12.728-28.412-28.428-28.412h-413.144c-15.7.001-28.428 12.722-28.428 28.412v290.919c0 24.521 12.728 36.669 28.428 36.669z" fill="#3c6382" data-original="#3c6382" class=""></path>
                        <path xmlns="http://www.w3.org/2000/svg" clip-rule="evenodd" d="m39 286.576v-226.395c0-13.37 10.852-24.181 24.203-24.181h344.594c13.353 0 24.203 10.812 24.203 24.181v226.395c0 8.87-1.818 16.726-5.953 22.666-4.365 6.271-10.927 9.758-18.25 9.758h-344.594c-8.064 0-14.448-4.611-18.395-10.604-3.895-5.916-5.807-13.565-5.808-21.82zm10 0v-226.395c0-7.832 6.36-14.181 14.203-14.181h344.594c7.844 0 14.203 6.35 14.203 14.181v226.395c0 15.308-6.359 22.424-14.203 22.424h-344.594c-7.843 0-14.202-8.802-14.203-22.424z" fill="#0a3d62" fill-rule="evenodd" data-original="#0a3d62" class=""></path>
                        <path xmlns="http://www.w3.org/2000/svg" d="m63.203 309h344.594c7.844 0 14.203-7.116 14.203-22.424v-226.395c0-7.831-6.359-14.181-14.203-14.181h-344.594c-7.843 0-14.203 6.349-14.203 14.181v226.395c.001 13.622 6.36 22.424 14.203 22.424z" fill="#82ccdd" data-original="#82ccdd"></path>
                        <path xmlns="http://www.w3.org/2000/svg" d="m407.797 309h-344.594c-7.844 0-14.202-8.802-14.203-22.424v-49.576c33.137 0 60-26.863 60-60s-26.863-60-60-60v-56.819c0-7.832 6.36-14.181 14.203-14.181h344.594c7.844 0 14.203 6.35 14.203 14.181v226.395c0 15.308-6.359 22.424-14.203 22.424z" fill="#edf5ff" data-original="#edf5ff" class=""></path>
                        <path xmlns="http://www.w3.org/2000/svg" d="m202.5 177.5c0 21.815-17.685 39.5-39.5 39.5s-39.5-17.685-39.5-39.5 17.685-39.5 39.5-39.5 39.5 17.685 39.5 39.5z" fill="#0a3d62" data-original="#0a3d62" class=""></path>
                        <path xmlns="http://www.w3.org/2000/svg" d="m163.03 164h65.773c7.311 0 13.197 5.886 13.197 13.197s-5.886 13.197-13.197 13.197h-65.773c-7.311 0-13.197-5.886-13.197-13.197s5.886-13.197 13.197-13.197z" fill="#3c6382" data-original="#3c6382" class=""></path>
                        <path xmlns="http://www.w3.org/2000/svg" d="m426 88c8.864 0 16 7.136 16 16v32c0 8.864-7.136 16-16 16s-16-7.136-16-16v-32c0-8.864 7.136-16 16-16z" fill="#4c789b" data-original="#4c789b"></path>
                        <path xmlns="http://www.w3.org/2000/svg" d="m426 204c8.864 0 16 7.136 16 16v32c0 8.864-7.136 16-16 16s-16-7.136-16-16v-32c0-8.864 7.136-16 16-16z" fill="#4c789b" data-original="#4c789b"></path>
                        <path xmlns="http://www.w3.org/2000/svg" d="m64 356h50v25c0 2.761-2.239 5-5 5h-40c-2.761 0-5-2.239-5-5z" fill="#0a3d62" data-original="#0a3d62" class=""></path>
                        <path xmlns="http://www.w3.org/2000/svg" d="m357 356h50v25c0 2.761-2.239 5-5 5h-40c-2.761 0-5-2.239-5-5z" fill="#0a3d62" data-original="#0a3d62" class=""></path>
                        <path xmlns="http://www.w3.org/2000/svg" d="m388.976 135h-111.951c-1.671 0-3.025-1.359-3.025-3.034v-17.931c0-1.676 1.354-3.035 3.025-3.035h111.951c1.67 0 3.024 1.359 3.024 3.035v17.931c0 1.675-1.354 3.034-3.024 3.034z" fill="#82ccdd" data-original="#82ccdd"></path>
                        <g xmlns="http://www.w3.org/2000/svg" fill="#3c6382">
                            <path d="m298.001 171h-16c-4.423 0-8.001-3.578-8.001-7.999 0-4.423 3.578-8.001 8.001-8.001h16c4.421 0 8 3.578 8 8.001 0 4.421-3.579 7.999-8 7.999z" fill="#3c6382" data-original="#3c6382" class=""></path>
                            <path d="m341.001 171h-16c-4.423 0-8.001-3.578-8.001-7.999 0-4.423 3.578-8.001 8.001-8.001h16c4.421 0 8 3.578 8 8.001 0 4.421-3.579 7.999-8 7.999z" fill="#3c6382" data-original="#3c6382" class=""></path>
                            <path d="m384.001 171.307h-16.002c-4.421 0-7.999-3.578-7.999-7.999 0-4.423 3.578-8.001 7.999-8.001h16.002c4.421 0 8 3.578 8 8.001 0 4.421-3.579 7.999-8 7.999z" fill="#3c6382" data-original="#3c6382" class=""></path>
                            <path d="m297.999 207.571h-15.999c-4.423 0-8-3.579-8-8s3.577-8 8-8h15.999c4.421 0 8 3.579 8 8s-3.579 8-8 8z" fill="#3c6382" data-original="#3c6382" class=""></path>
                            <path d="m340.999 207.571h-15.999c-4.423 0-8-3.579-8-8s3.577-8 8-8h15.999c4.421 0 8 3.579 8 8s-3.579 8-8 8z" fill="#3c6382" data-original="#3c6382" class=""></path>
                            <path d="m383.999 207.307h-16c-4.422 0-7.999-3.579-7.999-8s3.577-8 7.999-8h16c4.421 0 8 3.579 8 8s-3.579 8-8 8z" fill="#3c6382" data-original="#3c6382" class=""></path>
                            <path d="m298.001 243.571h-16c-4.423 0-8.001-3.578-8.001-7.999 0-4.423 3.578-8.001 8.001-8.001h16c4.421 0 8 3.578 8 8.001 0 4.421-3.579 7.999-8 7.999z" fill="#3c6382" data-original="#3c6382" class=""></path>
                            <path d="m384.145 243.571h-64.001c-4.423 0-8.001-3.578-8.001-7.999 0-4.423 3.578-8.001 8.001-8.001h64.001c4.423 0 8.001 3.578 8.001 8.001 0 4.421-3.578 7.999-8.001 7.999z" fill="#3c6382" data-original="#3c6382" class=""></path>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection




