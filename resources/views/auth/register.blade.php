@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center row-my">
        <div class="col-md-8 col-md-my">
            <div class="card  card-my">
                <div class="card-header card-header-my"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="100" height="100" x="0" y="0" viewBox="0 0 497 497" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg"><path d="m444.741 213.43v261.75c0 12.05-9.77 21.82-21.83 21.82h-356.32c-12.06 0-21.83-9.77-21.83-21.82v-261.75c0-12.05 9.77-21.82 21.83-21.82h356.32c12.06 0 21.83 9.77 21.83 21.82z" fill="#f5fcff" data-original="#f5fcff" class=""></path><path d="m422.915 191.605h-23.849c12.053 0 21.823 9.771 21.823 21.823v261.748c0 12.053-9.771 21.823-21.823 21.823h23.849c12.053 0 21.823-9.771 21.823-21.823v-261.748c0-12.053-9.77-21.823-21.823-21.823z" fill="#e0f5fe" data-original="#e0f5fe" class=""></path><path d="m223.901 191.61v61.75c-1.1.04-2.19.05-3.29.05-35.35 0-67.31-14.48-90.29-37.82-.21-.21-.41-.42-.62-.63-6.83-7.04-12.86-14.88-17.91-23.35z" fill="#e0f5fe" data-original="#e0f5fe" class=""></path><path d="m371.451 126.7c0 36.98-15.84 70.25-41.1 93.42-.21.19-.42.38-.63.56l-23.1-.67-152.16-4.42c-.21-.21-.41-.42-.62-.63-22.15-22.82-35.79-53.95-35.79-88.26 0-65.95 50.39-120.14 114.78-126.15 3.92-.36 7.9-.55 11.92-.55 69.98 0 126.7 56.73 126.7 126.7z" fill="#dad2ff" data-original="#dad2ff" class=""></path><path d="m371.451 126.7c0 36.98-15.84 70.25-41.1 93.42-.21.19-.42.38-.63.56l-23.1-.67c25.19-23.17 40.98-56.39 40.98-93.31 0-65.95-50.39-120.13-114.77-126.14v-.01c3.92-.36 7.9-.55 11.92-.55 69.98 0 126.7 56.73 126.7 126.7z" fill="#c3b4fa" data-original="#c3b4fa" class=""></path><path d="m390.599 341.293h-201.994c-5.417 0-9.808-4.391-9.808-9.808v-38.671c0-5.417 4.391-9.808 9.808-9.808h201.994c5.417 0 9.808 4.391 9.808 9.808v38.671c0 5.417-4.391 9.808-9.808 9.808z" fill="#e0f5fe" data-original="#e0f5fe" class=""></path><path d="m390.599 283.006h-23.849c5.417 0 9.808 4.391 9.808 9.808v38.671c0 5.417-4.391 9.808-9.808 9.808h23.849c5.417 0 9.808-4.391 9.808-9.808v-38.671c0-5.417-4.391-9.808-9.808-9.808z" fill="#c8effe" data-original="#c8effe"></path><path d="m390.599 434.93h-201.994c-5.417 0-9.808-4.391-9.808-9.808v-38.672c0-5.417 4.391-9.808 9.808-9.808h201.994c5.417 0 9.808 4.391 9.808 9.808v38.671c0 5.418-4.391 9.809-9.808 9.809z" fill="#e0f5fe" data-original="#e0f5fe" class=""></path><path d="m390.599 376.642h-23.849c5.417 0 9.808 4.391 9.808 9.808v38.671c0 5.417-4.391 9.808-9.808 9.808h23.849c5.417 0 9.808-4.391 9.808-9.808v-38.671c0-5.416-4.391-9.808-9.808-9.808z" fill="#c8effe" data-original="#c8effe"></path><path d="m128.778 326.71h-26.544c-8.473 0-15.342-6.869-15.342-15.342 0-8.473 6.869-15.342 15.342-15.342h26.544c8.473 0 15.342 6.869 15.342 15.342 0 8.473-6.869 15.342-15.342 15.342z" fill="#a09bff" data-original="#a09bff"></path><path d="m128.778 296.026h-23.849c8.473 0 15.342 6.869 15.342 15.342s-6.869 15.342-15.342 15.342h23.849c8.473 0 15.342-6.869 15.342-15.342s-6.869-15.342-15.342-15.342z" fill="#8080e5" data-original="#8080e5"></path><path d="m128.778 426.014h-26.544c-8.473 0-15.342-6.869-15.342-15.342 0-8.473 6.869-15.342 15.342-15.342h26.544c8.473 0 15.342 6.869 15.342 15.342 0 8.473-6.869 15.342-15.342 15.342z" fill="#a09bff" data-original="#a09bff"></path><path d="m128.778 395.33h-23.849c8.473 0 15.342 6.869 15.342 15.342s-6.869 15.342-15.342 15.342h23.849c8.473 0 15.342-6.869 15.342-15.342s-6.869-15.342-15.342-15.342z" fill="#8080e5" data-original="#8080e5"></path><path d="m329.721 220.68c-22.48 20.34-52.28 32.73-84.97 32.73-35.35 0-67.31-14.48-90.29-37.82l1.11-7.82c2.01-14.24 14.21-24.83 28.59-24.83h115.14c14.38 0 26.58 10.59 28.59 24.83z" fill="#60b7ff" data-original="#60b7ff" class=""></path><path d="m327.891 207.77c-2.01-14.24-14.21-24.83-28.59-24.83h-23.849c14.38 0 26.58 10.59 28.59 24.83l.785 5.537c.668 4.709-1.169 9.447-4.884 12.417-18.746 14.986-41.835 24.759-67.074 27.126 3.913.364 7.875.56 11.883.56 32.69 0 62.49-12.39 84.97-32.73z" fill="#26a6fe" data-original="#26a6fe"></path><path d="m241.731 201.525c-9.847 0-17.829-7.982-17.829-17.829v-37.282h35.658v37.282c0 9.846-7.982 17.829-17.829 17.829z" fill="#ffb09e" data-original="#ffb09e" class=""></path><path d="m200.214 76.836c0-17.647 14.306-31.953 31.953-31.953h52.956c8.824 0 15.978 7.154 15.978 15.978 0 8.825-7.154 15.978-15.978 15.978l-1.876-.003-38.495 8.541z" fill="#938493" data-original="#938493" class=""></path><path d="m285.123 44.883h-24.755c8.824 0 15.978 7.154 15.978 15.978 0 8.819-7.145 15.968-15.962 15.977l24.738.001c8.825 0 15.979-7.153 15.979-15.978 0-8.824-7.154-15.978-15.978-15.978z" fill="#938493" data-original="#938493" class=""></path><path d="m283.247 76.836v50.288c0 15.233-12.349 27.582-27.582 27.582h-27.869c-15.233 0-27.582-12.349-27.582-27.582v-50.288z" fill="#ffcebf" data-original="#ffcebf" class=""></path><path d="m259.398 76.836v50.288c0 15.233-12.349 27.582-27.582 27.582h23.849c15.233 0 27.582-12.349 27.582-27.582v-50.288z" fill="#ffb09e" data-original="#ffb09e" class=""></path><g fill="#8ac9fe"><circle cx="222.554" cy="405.786" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle><circle cx="256.717" cy="405.786" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle><circle cx="290.881" cy="405.786" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle><circle cx="325.268" cy="405.786" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle><circle cx="361.015" cy="405.786" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle></g><g fill="#8ac9fe"><circle cx="222.554" cy="311.368" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle><circle cx="256.717" cy="311.368" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle><circle cx="290.881" cy="311.368" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle><circle cx="325.268" cy="311.368" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle><circle cx="361.015" cy="311.368" r="7.623" fill="#8ac9fe" data-original="#8ac9fe"></circle></g><path d="m443.633 149.995 6.409-6.409c2.929-2.93 2.929-7.678 0-10.607-2.929-2.928-7.678-2.928-10.606 0l-6.409 6.409-6.409-6.409c-2.929-2.928-7.678-2.928-10.606 0-2.929 2.93-2.929 7.678 0 10.607l6.409 6.409-6.409 6.409c-2.929 2.93-2.929 7.678 0 10.607 1.464 1.464 3.384 2.196 5.303 2.196s3.839-.732 5.303-2.196l6.409-6.409 6.409 6.409c1.464 1.464 3.384 2.196 5.303 2.196s3.839-.732 5.303-2.196c2.929-2.93 2.929-7.678 0-10.607z" fill="#fd8087" data-original="#fd8087" class=""></path><g><path d="m262.848 471.885h-42.234c-4.142 0-7.5-3.357-7.5-7.5s3.358-7.5 7.5-7.5h42.234c4.142 0 7.5 3.357 7.5 7.5s-3.357 7.5-7.5 7.5z" fill="#60b7ff" data-original="#60b7ff" class=""></path></g></g></g></svg></div>

                <div class="card-body card-body-my">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 input-cen">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6 input-dev">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 input-cen">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6 input-dev">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 input-cen">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6 input-dev">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
