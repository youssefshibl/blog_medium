<x-home-master>
    @section('content')
            @include('layout_.left_nav')

            <div class="profile-container" style="width: 100%;">
                @yield('body-content')
            </div>
    @endsection

</x-home-master>
