@extends('me.assembly')


@section('body-content')
<div class="middle_body" style="width: 75%;">
 <div class="me-container" style="display: inline-flex;justify-content: space-between;width: 100%;margin: 10px;">
    <div class="me-left" style="margin-left: 20px;margin-top: 10px;width: 20%;border-right: 1px solid #0000002e;">
            <a href="{{ route('me.account' )}}" style="display: block;margin-top: 10px;margin-bottom: 10px;font-size: 18px;color: #4f4d4dc4;text-align: left;text-decoration: none"><span >account</span></a>
            <a href="{{ route('me.setting' )}}" style="display: block;margin-top: 10px;margin-bottom: 10px;font-size: 18px;color: #4f4d4dc4;text-align: left;text-decoration: none"><span style=" font-weight: bold;font-size: 21px;">Settings</span></a>

    </div>
    <div class="me-righ" style="width: 80%;margin-top: 10px;margin-left: 50px;">
{{-- <div class="line" style="width: 90%;border-top: 1px solid #00000040;margin: 5px auto 5px auto;"></div> --}}
@csrf



    </div>
 </div>
</div>

@endsection

@section('script')
<script src="{{asset('js/me.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@endsection


@section('title')
setting
@endsection
