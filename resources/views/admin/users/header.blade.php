<div class="header-contiainer" style="width: 100%;">
    <div class="inner-header" style="display: inline-flex;margin: 70px 50px 20px 105px;align-items: center;justify-content: center;padding-bottom: 24px;border-bottom: 2px solid #00000014;">
        <div class="image-box-heaer" style="width: 150px;height: 150px;overflow: hidden;border-radius: 75px;display: inline-block;">
            <img src="{{$user->image()->first()->path ?? asset('image/me.jpg')}}" alt="" style="width: 150px;">
        </div>
        <div class="text-heaer-box" style="margin-left: 50px;width: 80%;">
            <h4 style="border-bottom: 2px solid #00000040;padding-bottom: 11px;display: inline-block;">{{$user->name}}</h4>
            <h6 style="width: 80%;font-size: 16px;">Again, if the validation fails, the proper response will automatically be generated. If the validation passes, our controller will continue executing normally</h6>
            <a href="{{ route('admin.users.delete' , ['id'=> $user->id])}}" class="btn btn-danger delete-user" style="padding: 2px 10px !important;">Delete</a>

        </div>
    </div>
</div>
