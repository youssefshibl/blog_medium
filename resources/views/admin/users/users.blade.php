@extends('admin.assembly')

@section('content')
 <!-- Begin Page Content -->
<div class="search-form-users">
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0  navbar-search" style="width: 400px !important;" action="{{ route('admin.users.search')}}">
        <div class="input-group">
          <input name="search" type="text" style="background-color: white !important;" class="form-control bg-light border-0 small" placeholder="Search for Users" aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
    </form>
</div>
@if (session('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 20px">
        {{ session('success') }}
    </div>
@endif
<h3 style="color: #4b71dd;margin-left: 25px;margin-top: 20px;border-bottom: 2px solid #00000021;width: max-content;" >Users</h3>
<div class="users-table">
    <table style="width:90%;margin-left: auto;margin-right: auto;border-collapse: separate;border-spacing: 10px;" >
        <tr style="color: #466cd9;" >
          <th>#</th>
          <th style="text-align: center;">Name</th>
          <th style="text-align: center;">Email</th>
          <th style="text-align: center;">Data Created</th>
          <th style="text-align: center;">Role</th>
          <th style="text-align: center;">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>
                <div class="box-name-imag" style="display: flex;justify-content: space-between;align-items: center;">
                    <div class="image-user" style="width: 30px;height: 30px;overflow: hidden;border-radius: 15px">
                        <img src="{{ $user->image()->first()->path ?? asset('image/me.jpg')}}" alt="" style="width: 100%">
                    </div>
                    <span>
                        {{ $user->name }}
                    </span>
                </div>

            </td>
            <td style="text-align: center;">{{ $user->email}}</td>
            <td style="text-align: center;">{{ $user->created_at}}</td>
            @if ($user->premium == 1)
            <td style="text-align: center;">Premium</td>
            @else
            <td style="text-align: center;">Normal</td>
            @endif
            <td style="text-align: center;">
                <a href="{{ route('admin.users.showprofile' , ['id'=> $user->id])}}" class="btn btn-primary" style="padding: 2px 10px !important;">show</a>
                <a href="{{ route('admin.users.delete' , ['id'=> $user->id])}}" class="btn btn-danger delete-user" style="padding: 2px 10px !important;">Delete</a>
            </td>
        </tr>
        @endforeach



      </table>
      <div class="pag" style="margin-left: 58px;margin-top: 30px;" >
        {!! $users->withQueryString()->links() !!}

      </div>
</div>

@endsection

@section('script')
<script>
            document.querySelector('.components-me').classList.add('active');
            document.querySelector('.components-me-user').classList.add('collapsed');
            document.querySelector('.components-me-show').classList.add('show');
            document.querySelector('.users-me').classList.add('active');
    </script>
@endsection
