@extends('me.assembly')


@section('body-content')
<div class="middle_body" style="width: 75%;">
<div class="me-container" style="display: inline-flex;justify-content: space-between;width: 100%;margin: 10px;">
    <div class="me-left" style="margin-left: 20px;margin-top: 10px;width: 20%;border-right: 1px solid #0000002e;">
            <a href="{{ route('me.account' )}}" style="display: block;margin-top: 10px;margin-bottom: 10px;font-size: 18px;color: #4f4d4dc4;text-align: left;text-decoration: none"><span style=" font-weight: bold;font-size: 21px;">account</span></a>
            <a href="{{ route('me.setting' )}}" style="display: block;margin-top: 10px;margin-bottom: 10px;font-size: 18px;color: #4f4d4dc4;text-align: left;text-decoration: none"><span>Settings</span></a>

    </div>
    <div class="me-righ" style="width: 80%;margin-top: 10px;margin-left: 50px;">
{{-- <div class="line" style="width: 90%;border-top: 1px solid #00000040;margin: 5px auto 5px auto;"></div> --}}
@csrf
<div class="information-box" style="font-size: 25px;font-weight: 700;margin-bottom: 10px;">
    <div class="title">
        Name
    </div>
    <div class="information-box-main" style="width: 100%;display: inline-flex;justify-content: space-between;align-items: center;">
        <input name="username" type="text" style="width: 60%;height: 30px;border: none;font-size: 16px;font-weight: 200;margin-left: 20px; border-bottom: 2px solid #71716d5c" disabled="" value="{{Auth::user()->name}}">
        <div class="box-main-option">
            <button class="save" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid green;border-radius: 15px;color: green; display: none">save</button>
            <button class="edit" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;">edit</button>
            <button  class="cancel" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;display: none">cancel</button>
        </div>
    </div>
</div>
<div class="information-box" style="font-size: 25px;font-weight: 700;margin-bottom: 10px;">
    <div class="title">
        Email
    </div>
    <div class="information-box-main" style="width: 100%;display: inline-flex;justify-content: space-between;align-items: center;">
        <input name="email" type="text" style="width: 60%;height: 30px;border: none;font-size: 16px;font-weight: 200;margin-left: 20px;border-bottom: 2px solid #71716d5c" disabled="" value="{{Auth::user()->email}}">
        <div class="box-main-option">
            <button class="save" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid green;border-radius: 15px;color: green; display: none">save</button>
            <button class="edit" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;">edit</button>
            <button  class="cancel" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;display: none">cancel</button>
        </div>
    </div>
</div>
<div class="information-box" style="font-size: 25px;font-weight: 700;margin-bottom: 10px;">
    <div class="title">
        Phone
    </div>
    <div class="information-box-main" style="width: 100%;display: inline-flex;justify-content: space-between;align-items: center;">
        <input name="phone" type="text" style="width: 60%;height: 30px;border: none;font-size: 16px;font-weight: 200;margin-left: 20px;border-bottom: 2px solid #71716d5c" disabled="" value="{{Auth::user()->phone}}">
        <div class="box-main-option">
            <button class="save" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid green;border-radius: 15px;color: green; display: none">save</button>
            <button class="edit" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;">edit</button>
            <button  class="cancel" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;display: none">cancel</button>
        </div>
    </div>
</div>
<div class="information-box" style="font-size: 25px;font-weight: 700;margin-bottom: 10px;">
    <div class="title">
        Address
    </div>
    <div class="information-box-main" style="width: 100%;display: inline-flex;justify-content: space-between;align-items: center;">
        <input name="address" type="text" style="width: 60%;height: 30px;border: none;font-size: 16px;font-weight: 200;margin-left: 20px;border-bottom: 2px solid #71716d5c" disabled="" value="{{Auth::user()->address}}">
        <div class="box-main-option">
            <button class="save" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid green;border-radius: 15px;color: green; display: none">save</button>
            <button class="edit" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;">edit</button>
            <button  class="cancel" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;display: none">cancel</button>
        </div>
    </div>
</div>
<div class="information-box" style="font-size: 25px;font-weight: 700;margin-bottom: 10px;">
    <div class="title">
        Born Data
    </div>
    <div class="information-box-main" style="width: 100%;display: inline-flex;justify-content: space-between;align-items: center;">
        <input name="born" type="date" style="width: 60%;height: 30px;border: none;font-size: 16px;font-weight: 200;margin-left: 20px;border-bottom: 2px solid #71716d5c" disabled="" value="{{Auth::user()->address}}">
        <div class="box-main-option">
            <button class="save" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid green;border-radius: 15px;color: green; display: none">save</button>
            <button class="edit" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;">edit</button>
            <button  class="cancel" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;display: none">cancel</button>
        </div>
    </div>
</div>
<div class="information-box" style="font-size: 25px;font-weight: 700;margin-bottom: 10px;">
    <div class="title">
        Image Profile <span style="color: white;background: #00800099;padding: 2px 15px;border-radius: 16px;">125 x 125</span>
    </div>
    <div class="information-box-main" style="width: 100%;display: inline-flex;justify-content: space-between;align-items: center;margin-top: 40px;">
        <input enctype="multipart/form-data" type="file" id="avatar" name="avatar"  style="display: none;" disabled="">
        <label for="avatar" style="font-size: 15px;background: #00800078;color: white;padding: 6px 17px;border-radius: 19px;">Uploade image</label>
<div class="image-profile" style="width: 125px;height: 125px;overflow: hidden;border-radius: 62.5px;">
    <img src="{{ auth()->user()->image->path ?? '/image/me.jpg' }}" alt="" style="width: 125px;">
</div>
        <div class="box-main-option">
            <button class="save-image" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid green;border-radius: 15px;color: green; display: none">save</button>
            <button class="edit-image" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;">edit</button>
            <button  class="cancel-image" style="font-weight: 400;font-size: 15px;padding: 2px 30px;background: white;border: 1px solid #00000063;border-radius: 15px;display: none">cancel</button>
        </div>
    </div>
</div>

    </div>
</div>
    </div>

@endsection




@section('title')
account
@endsection
