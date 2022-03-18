@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center row-my">
        <div class="col-md-8 col-md-my">
            <div class="card card-my">
                <div class="card-header card-header-my"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="100" height="100" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;padding-top: 10px;" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m481.578125 9.238281c-3.988281-5.78125-10.558594-9.238281-17.578125-9.238281h-229.332031c-35.285157 0-64 28.714844-64 64v16.617188c.832031.75 1.789062 1.324218 2.578125 2.136718l85.335937 85.332032c12.09375 12.074218 18.75 28.160156 18.75 45.246093 0 17.089844-6.65625 33.175781-18.75 45.25l-85.335937 85.332031c-.789063.789063-1.746094 1.367188-2.578125 2.132813v37.953125c0 35.285156 28.714843 64 64 64h74.664062c8.855469 0 16.789063-5.460938 19.925781-13.738281l154.667969-405.332031c2.515625-6.550782 1.621094-13.910157-2.347656-19.691407zm0 0" fill="#2196f3" data-original="#2196f3"></path><path xmlns="http://www.w3.org/2000/svg" d="m119.828125 318.378906c-7.957031-3.308594-13.160156-11.09375-13.160156-19.710937v-64h-85.335938c-11.773437 0-21.332031-9.558594-21.332031-21.335938 0-11.773437 9.558594-21.332031 21.332031-21.332031h85.335938v-64c0-8.617188 5.203125-16.40625 13.160156-19.710938 7.980469-3.308593 17.152344-1.472656 23.253906 4.628907l85.332031 85.332031c8.34375 8.34375 8.34375 21.824219 0 30.164062l-85.332031 85.335938c-6.101562 6.101562-15.273437 7.933594-23.253906 4.628906zm0 0" fill="#607d8b" data-original="#607d8b"></path><path xmlns="http://www.w3.org/2000/svg" d="m455.742188 2.113281-128.167969 42.730469c-17.300781 5.972656-28.90625 22.25-28.90625 40.488281v384c0 23.53125 19.132812 42.667969 42.664062 42.667969 4.566407 0 8.898438-.660156 13.589844-2.113281l128.171875-42.730469c17.300781-5.972656 28.90625-22.25 28.90625-40.488281v-384c0-28.097657-27.328125-49.453125-56.257812-40.554688zm0 0" fill="#64b5f6" data-original="#64b5f6" class=""></path></g></svg></div>

                <div class="card-body card-body-my">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 input-cen">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6  input-dev">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 input-cen">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6 input-dev">

                                <i class="fa-regular fa-eye-slash icon-eye"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 ">
                            <div class="col-md-6 offset-md-4 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 login-my">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-page')
document.querySelector('.icon-eye').onclick = function(){ console.log('yes');

  let aa = document.getElementById('password').getAttribute('type');
  document.querySelector('.fa-regular').classList.toggle('icon-eye-active');
   if(aa == 'text'){
    document.getElementById('password').setAttribute('type' , 'password');
  }else{
    document.getElementById('password').setAttribute('type' , 'text');
  }


}
@endsection
