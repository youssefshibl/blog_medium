@extends('admin.users.assembly')

@section('body-content')
<div class="profile-body" style="display: inline-flex;width: 100%;">
    <div class="profile-info-left" style="display: inline-flex;flex-direction: column;border-right: 1px solid #0000002e;margin: 50px 25px 30px 120px;padding-right: 20px;">
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.showprofile' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Infomation</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.lists' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Lists</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.users.posts' , ['id'=> $user->id])}}" style="text-decoration: none;color: unset;">Posts</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.likes.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Likes</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.comments.show' , ['username'=> $user->name])}}" style="text-decoration: none;">Comments</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.following.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Following</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.followers.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Followers</a></span>
        <span style="margin: 10px;font-size: 20px;"><a href="{{route('admin.savelists.show' , ['username'=> $user->name])}}" style="text-decoration: none;color: unset;">Save lists</a></span>

    </div>
    <div class="container ">
			  
        <div class="card">
           <div class="row">
               <div class="col-md-12">
                   @if(session()->has('success'))
                     <div class="alert alert-success">
                          {{session()->get('success')}}
                    </div>
                       
                   @endif
                   <h3 class="text-center mb-5">
                        comment section
                   </h3>
                   <h6 style="width: fit-content;margin-bottom: 20px;padding: 5px 10px;background: #92c14d;color: white;border-radius: 5px;" >
                    <a href="{{route('admin.post.show' , ['post'=> $post->id])}}" style="text-decoration: none;color: unset;" >
                        {{$post->title}}
                    </a>   
                    </h6>
                   <div class="row">
                       <div class="col-md-12">
                        @foreach ($comments as $comment)
                           <div class="media"  
                           @isset($comment_id)
                            @if($comment->id == $comment_id)
                            style="background: #dc354566;padding: 15px 0px 5px 20px;border-radius: 5px;color: white;"
                                @endif
                           @endisset
                           
                           >
                            <a class="pr-3" href="{{ route('admin.users.showprofile' , ['id'=> $comment->user->id])}}">
                               <div class="box-image">
                                <img class="mr-3 " alt="Bootstrap Media Preview" src="{{$comment->user->image->path ?? '/image/me.jpg'}}" />
                               </div>
                            </a>
                               <div class="media-body">
                                   <div class="row">
                                    <div class="col-8 d-flex">
                                       <h5>{{$comment->user->name}} </h5>
                                       <span style="margin-left: 10px">{{$comment->created_at->diffForHumans()}}</span>
                                    </div>
                                    
                                        <div class="col-4">
                                        
                                            <div class="pull-right reply">
                                            
                                                <form style="display: none" method="POST"  id="deletcomment{{$comment->id}}" action="{{ route('admin.comment.delete' , [ 'id'=> $comment->id])}}">
                                                    <input type="hidden" name="_method"  value="DELETE">
                                                    @csrf
                                                </form>
                                                <span style="background: #dc3545;color: white;padding: 3px 10px;border-radius: 5px;margin-left: 50px;">
                                                    <a href="" style="text-decoration: none;color: white" onclick="event.preventDefault();
                                                    document.getElementById('deletcomment{{$comment->id}}').submit();">Delet</a>
                                                </span>
                                            
                                            </div>
                                        
                                        </div>
                                   </div>		
                                   <span>
                                    {{$comment->comment}} 

                                   </span>
                                   @foreach ($comment->getchildcomments as $childcomment)                                  
                                   <div class="media mt-4" 
                                   @isset($comment_id)
                                        @if($childcomment->id == $comment_id)
                                        style="background: #dc354566;padding: 15px 0px 5px 20px;border-radius: 5px;color: white;"
                                        @endif
                                   @endisset       
                                   >
                                        <a class="pr-3" href="{{ route('admin.users.showprofile' , ['id'=> $childcomment->user->id])}}">
                                            <div class="box-image">
                                                <img alt="Bootstrap Media Another Preview" src="{{$childcomment->user->image->path ?? '/image/me.jpg'}}" />

                                            </div>
                                        </a>
                                       <div class="media-body">
                                               
                                           <div class="row">
                                                <div class="col-8 d-flex">
                                                <h5>{{$childcomment->user->name}}</h5>
                                                <span style="margin-left: 10px">{{$childcomment->created_at->diffForHumans()}}</span>
                                                </div>
                                                <div class="pull-right reply">
                                            
                                                    <form style="display: none" method="POST"  id="deletcomment{{$childcomment->id}}" action="{{ route('admin.comment.delete' , [ 'id'=> $childcomment->id])}}">
                                                        <input type="hidden" name="_method"  value="DELETE">
                                                        @csrf
                                                    </form>
                                                    <span style="background: #dc3545;color: white;padding: 3px 10px;border-radius: 5px;margin-left: 50px;">
                                                        <a href="" style="text-decoration: none;color: white" onclick="event.preventDefault();
                                                        document.getElementById('deletcomment{{$childcomment->id}}').submit();">Delet</a>
                                                    </span>
                                                
                                                </div>
                                    
                                   
                                           </div>

                                           {{$childcomment->comment}}                                      
                                         </div>
                                   </div>
                                    @endforeach
                                   
                                   
                               </div>
                           </div>             
                        @endforeach
                           
                       </div>
                   </div>
               </div>
           </div>
           </div>
       </div>
    
</div>


@endsection

@section('style')
<style>

html,
body {
    height: 100%
}






 .card {
     position: relative;
     display: flex;
     padding:20px;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: transparent !important;
     background-clip: border-box;
     border: none !important;
     border-radius: 11px;
     -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
     -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
    
 }

.box-image{
    width: 50px;
height: 50px;
border-radius: 25px;
overflow: hidden;


}
.box-image img{
    width: 100%;
}


.reply a {
    
    text-decoration: none;
}
.media{
    margin-bottom: 20px;
}
</style>
@endsection

@section('script')

<script>
            document.querySelector('.components-me').classList.add('active');
            document.querySelector('.components-me-user').classList.add('collapsed');
            document.querySelector('.components-me-show').classList.add('show');
            document.querySelector('.users-me').classList.add('active');
    </script>
@endsection