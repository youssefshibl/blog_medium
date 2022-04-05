<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- font awsom --}}
    <link rel="stylesheet" href="{{  asset('css/all.min.css') }}">
    {{-- my css file --}}
    <link rel="stylesheet" href=" {{ asset('css/main_one.css') }}">
    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

     {{-- jquery --}}
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- bootstrap (css and jss) --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>


    <title>@yield('title' , 'Blog')</title>

    {{-- bootbox librart --}}
    <script src="{{ asset('js/bootbox/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/bootbox/bootbox.locales.min.js') }}"></script>
    <script>
        $(document).on("click", ".show-alert", function(e) {
            bootbox.alert("Hello world!", function() {
                console.log("Alert Callback");
            });
        });
    </script>

     {{-- // option to set any script in spectial page --}}
 <link rel="stylesheet" href="{{asset('css/data.css')}}">
@yield('style')
</head>

<body>
    {{-- load page --}}
    <div class="load" style="position: fixed;z-index: 2;background: #ffffffd1;width: 100%;display: flex;justify-content: center;align-items: center;height: 100vh;">
        <div class="boxes">
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
 {{-- csrf_field --}}
    <div class="scrf">
        @csrf
    </div>
    {{-- page content --}}
    <div class="large_box">
        <div class="larg_box_two">
            @yield('content')
        </div>
    </div>


<script>
//  script for remove the load page after page loaded
window.onload = function()
{
    setTimeout(() => {
        document.querySelector('.load').style.display = 'none';

    }, 1000);
}
</script>

    @yield('script')
</body>

</html>
