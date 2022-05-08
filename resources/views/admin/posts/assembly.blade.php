<x-admin-templet>
    @section('content')
         @yield('body-content')
    @endsection

    @section('style')
    
    <link rel="stylesheet" href=" {{ asset('css/main_one.css') }}">
     @endsection
 </x-admin-templet>