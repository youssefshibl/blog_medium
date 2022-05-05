<x-admin-templet>
   @section('content')
        @include('admin.users.header')
        @yield('body-content')
   @endsection
   @section('style')
   <link rel="stylesheet" href=" {{ asset('css/main_one.css') }}">

    @endsection
</x-admin-templet>
