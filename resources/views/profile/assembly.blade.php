<x-home-master>
    @section('content')
            @include('layout_.left_nav')

            <div class="profile-container" style="width: 100%;">
                @include('profile.header')

                @yield('body-content')
            </div>


    @endsection

    @section('script')
{{-- my script --}}
    <script src="{{ asset('js/main_one.js') }}"></script>
    @endsection


</x-home-master>
