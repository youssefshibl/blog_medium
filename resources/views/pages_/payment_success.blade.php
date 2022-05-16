
{{-- @extends('layout_.assembly') --}}
@extends('pages_.assembly')

@section('body-content')
{{-- <h1>{{__('messages.welcome')}}</h1> --}}
<div class="middle_body">

    @if (Auth::user()->verified == 0)
    <div class="alert alert-danger">
        <h6>Please verify your email</h6>
        </div>
    @endif

    @isset( $paymentFailed )
    <div class="alert alert-danger">
        {{$paymentFailed}}
    </div>
    @endisset
    @isset( $payment )
    <div class="alert alert-success">
        {{$payment}}
    </div>
    @endisset


</div>
@endsection
