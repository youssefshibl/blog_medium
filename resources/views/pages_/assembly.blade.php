<x-home-master>
    @section('content')
            @include('layout_.left_nav')

            @yield('body-content')
            @include('layout_.right_nav')
    @endsection

    @section('script')
{{-- my script --}}
    <script src="{{ asset('js/main_one.js') }}"></script>
    @endsection


</x-home-master>
