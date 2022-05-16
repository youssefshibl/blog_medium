
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
    
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if (Auth::user()->premium == 0)
        <div class="payment-box" style="background: #f2f2f2;text-align: center;width: fit-content;padding: 20px;border-radius: 5px;">
            <h1 style="padding: 10px 30px;">Be Premium</h1>
            <div class="option-box" style="display: flex;justify-content: space-between;font-size: 18px;align-items: center;margin: 10px 0px;">
                <span> show who view profiles</span>
                <i class="fa-solid fa-circle-check" style="color: #8dbb4b;"></i>
            </div>
            <div class="option-box" style="display: flex;justify-content: space-between;font-size: 18px;align-items: center;margin: 10px 0px;">
                <span> show who  profiles</span>
                <i class="fa-solid fa-circle-check" style="color: #8dbb4b;"></i>
            </div>
            <div class="option-box" style="display: flex;justify-content: space-between;font-size: 18px;align-items: center;margin: 10px 0px;">
                <span> show who view profiles</span>
                <i class="fa-solid fa-circle-check" style="color: #8dbb4b;"></i>
            </div>
            <div class="option-box" style="display: flex;justify-content: space-between;font-size: 18px;align-items: center;margin: 10px 0px;">
                <span> show who view </span>
                <i class="fa-solid fa-circle-check" style="color: #8dbb4b;"></i>
            </div>
            <div class="go-payment" style="width: fit-content;margin: 20px auto 10px auto;color: white;background: #fd483d;padding: 5px 10px;font-weight: bold;border-radius: 3px;">
                <a href="{{ $invoic_url }}" target="blank" style="text-decoration: none;color: unset;"> be premium</a>
            </div>
        </div>
    @else
    <div style="background: #f2f2f2;padding: 20px 20px;position: relative;margin-top: 60px;">
        <div style="position: absolute;width: 100px;height: 100px;background: #82ce34;border-radius: 50px;display: flex;justify-content: center;align-items: center;top: -50px;left: 41%;border: 5px solid white;">
            <i class="fa-solid fa-check" style="font-size: 50px;color: white;"></i>
        </div>

        <h1 style="text-align: center;padding-top: 50px;color: #82ce34;"> You are Premium </h1>

    </div>

    @endif

</div>
@endsection

