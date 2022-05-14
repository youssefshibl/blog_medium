@extends('me.assembly')


@section('body-content')
<div class="middle_body" style="width: 75%;">
 <div class="me-container" style="display: inline-flex;justify-content: space-between;width: 100%;margin: 10px;">
    <div class="me-left" style="margin-left: 20px;margin-top: 10px;width: 20%;border-right: 1px solid #0000002e;">
            <a href="{{ route('me.account' )}}" style="display: block;margin-top: 10px;margin-bottom: 10px;font-size: 18px;color: #4f4d4dc4;text-align: left;text-decoration: none"><span >{{ __('messages.account')}}</span></a>
            <a href="{{ route('me.setting' )}}" style="display: block;margin-top: 10px;margin-bottom: 10px;font-size: 18px;color: #4f4d4dc4;text-align: left;text-decoration: none"><span style=" font-weight: bold;font-size: 21px;">{{ __('messages.setting')}}</span></a>

    </div>
    <div class="me-righ" style="width: 80%;margin-top: 10px;margin-left: 50px;">
{{-- <div class="line" style="width: 90%;border-top: 1px solid #00000040;margin: 5px auto 5px auto;"></div> --}}
@csrf
        <div class="information-box" style="font-size: 25px;font-weight: 700;margin-bottom: 10px;">
            <div class="title">
                {{ __('messages.password') }}
            </div>
            <div class="information-box-main" style="width: 100%;display: inline-flex;justify-content: space-between;align-items: center;flex-direction: column;">
                <div>

                    <input name="currentpassword" required='required' type="password" style="width: 60%;height: 30px;border: none;font-size: 16px;font-weight: 200;margin-left: 20px; border-bottom: 2px solid #71716d5c;font-weight: bold" disabled="" value="" placeholder="{{ __('messages.current password')}}" >
                    <input name="newpassword" required='required' type="password" style="width: 60%;height: 30px;border: none;font-size: 16px;font-weight: 200;margin-left: 20px; border-bottom: 2px solid #71716d5c;font-weight: bold" disabled="" value="" placeholder="{{ __('messages.new password')}}">
                    <input name="confirmnewpassword" required='required'  type="password" style="width: 60%;height: 30px;border: none;font-size: 16px;font-weight: 200;margin-left: 20px; border-bottom: 2px solid #71716d5c;font-weight: bold" disabled="" value="" placeholder="{{ __('messages.confirm password')}}">

                </div>
                <div class="box-main-option">
                    <button class="save save-password" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid green;border-radius: 15px;color: green; display: none">{{ __('messages.save')}}</button>
                    <button class="edit edit-password" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;">{{ __('messages.edit')}}</button>
                    <button  class="cancel cancel-password" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;display: none">{{ __('messages.cancel')}}</button>
                </div>
            </div>
        </div>


    </div>
 </div>
</div>

@endsection

@section('script')
<script src="{{asset('js/me.js')}}"></script>

@endsection


@section('title')
setting
@endsection
