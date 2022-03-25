<x-home-master>
    @section('content')
    @include('layout_.left_nav')

    @yield('body-content')
    @endsection

    @section('script')
    <script src="{{ asset('js/main_one.js') }}"></script>
    <script src="{{asset('js/me.js')}}"></script>

    @endsection
</x-home-master>
