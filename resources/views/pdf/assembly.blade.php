<x-home-master-without>
    @section('content')


            @yield('body-content')

    @endsection

    @section('script')
{{-- my script --}}
    <script src="{{ asset('js/main_one.js') }}"></script>
    @endsection


</x-home-master-without>
