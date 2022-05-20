@extends('admin.others.assembly')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>

@endif
<div class="profile-box">
<h1>My Data </h1>
    <form action="{{ route('admin.saveprofile')}}" method="POST" enctype="multipart/form-data" >

        <div class="admin-data-box">
            <div class="bar-data-element">
                <div class="bro-box">
                    <div class="prob-name"> Name</div>
                    {{ csrf_field() }}
                    <input type="text" class="form-control prob-data" value="{{ $admin->name}}" name="name">
                </div>
                <div class="bro-box">
                    <div class="prob-name">Email</div>
                    <input type="email" class="form-control prob-data"  value="{{ $admin->email}}" name="email">
                </div>
            </div>
            <div class="bar-data-element">
                <div class="bro-box">
                    <div class="prob-name">Address</div>
                    <input type="text" class="form-control prob-data" value="{{ $admin->address}}" name="address">
                </div>
                <div class="bro-box">
                    <div class="prob-name">Phone</div>
                    <input type="text" class="form-control prob-data"  value="{{ $admin->phone }}" name="phone">
                </div>
            </div>
            <div class="bar-data-element">
                <div class="bro-box">
                    <div class="prob-name">Current password</div>
                    <input type="password" class="form-control prob-data" name="currentpassword">
                </div>
                <div class="bro-box">
                    <div class="prob-name">New password</div>
                    <input type="password" class="form-control prob-data"   name="newpassword">
                </div>
            </div>
            <div class="bar-data-element">
                <div class="bro-box">
                    <div class="prob-name">Configrm New password </div>
                    <input type="password" class="form-control prob-data"  name="confirmpassword">
                </div>
            </div>
            <div class="bar-data-element">
                <div class="image-input-box">
                    <div class="box-image">
                        <img src="{{ auth('admin')->user()->image()->first()->path}}" alt="" class="image-preview">
                    </div>
                    <div class="box-input">
                        <input type="file" class="form-control"  style="display: none" name="image" id="input-box-image">
                        <label for="input-box-image"> change image </label>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="buttom-save"> Save changes </button>
    </form>
</div>
.
<div class="profile-box">
<h1>Add new Admin </h1>
    <form action="{{ route('admin.addnewadmin')}}" method="POST" enctype="multipart/form-data" >

        <div class="admin-data-box">
            <div class="bar-data-element">
                <div class="bro-box">
                    <div class="prob-name"> Name</div>
                    {{ csrf_field() }}
                    <input type="text" class="form-control prob-data"  name="name">
                </div>
                <div class="bro-box">
                    <div class="prob-name">Email</div>
                    <input type="email" class="form-control prob-data"  name="email">
                </div>
            </div>
            <div class="bar-data-element">
                <div class="bro-box">
                    <div class="prob-name">Address</div>
                    <input type="text" class="form-control prob-data"  name="address">
                </div>
                <div class="bro-box">
                    <div class="prob-name">Phone</div>
                    <input type="text" class="form-control prob-data"   name="phone">
                </div>
            </div>
            <div class="bar-data-element">
                <div class="bro-box">
                    <div class="prob-name">password</div>
                    <input type="password" class="form-control prob-data" name="password">
                </div>
                <div class="bro-box">
                    <div class="prob-name">Confirm password</div>
                    <input type="password" class="form-control prob-data"   name="confirm password">
                </div>
            </div>

            <div class="bar-data-element">
                <div class="image-input-box">
                    <div class="box-image">
                        <img src="{{ asset('image/me.jpg')}}" alt="" class="image-preview2">
                    </div>
                    <div class="box-input">
                        <input type="file" class="form-control"  style="display: none" name="image" id="input-box-image2">
                        <label for="input-box-image2"> choose image </label>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="buttom-save"> add new admin  </button>
    </form>
</div>

@endsection

@section('script')
<script>
let image_input  = document.querySelector('[name="image"]');
image_input.addEventListener('change',function(event){
    let image = event.target.files[0];
    let image_preview = document.querySelector('.image-preview');
    let reader = new FileReader();
    reader.onload = function(){
        image_preview.src = reader.result;
    }
    reader.readAsDataURL(image);
});

let image_input2  = document.querySelector('#input-box-image2');
image_input2.addEventListener('change',function(event){
    let image = event.target.files[0];
    let image_preview = document.querySelector('.image-preview2');
    let reader = new FileReader();
    reader.onload = function(){
        image_preview.src = reader.result;
    }
    reader.readAsDataURL(image);
});
    </script>
@endsection

@section('style')
<style>
    .profile-box{
        margin: 10px;
        background: white;
        padding: 20px;
        border-radius: 15px;
    }
    .admin-data-box{
        width: 100%;
    }
    .bar-data-element{
        width: 100%;
        display: flex;
        margin-top: 10px;
        margin-bottom: 5px;
    }
    .bro-box{
        width: 50%;
    }
    .prob-name{
        margin-left: 20px;
        font-size: 17px;
        color: #456ad8;
    }
    .prob-data{
        margin-left: 30px;
        width: 80%;
    }
    .image-input-box{
        display: flex;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 10px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        justify-content: center;
    }
    .box-image{
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 50px;
        margin-right: 100px;
    }
    .box-image img{
        width: 100%;
    }

    .box-input label{
        padding: 5px 10px;
        background: #e74a3b;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    .buttom-save{
        color: white;
        border: none;
        padding: 5px 10px;
        background: #2b52c5;
        border-radius: 2px;
    }
</style>

@endsection
