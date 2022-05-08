
@extends('pages_.assembly')

@section('body-content')

<div class="middle_body" style="  width: 850px; margin-bottom: 30px">
    <div class="container" style="width: 100%;">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1" id="logout">
              <div class="page-header">
                  <h3 class="reviews">
                        <span style="color: white;background: #fd483d;padding: 3px 10px;border-radius: 3px;">Comments On</span>
                           <span style="display: block;margin-top: 10px;margin-bottom: 10px;">{{$post->title}}</span>
                        <span style="color: white;background: #007bff;padding: 3px 11px;border-radius: 4px;">
                            <a href="{{route('posts.show' , ['post'=> $post->id])}}" style="text-decoration: none;color: unset;">go to post </a>
                        </span>
                  </h3>

              </div>
              <div class="comment-tabs">
                  <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                      <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
                  </ul>
                  <div class="tab-content">
                      <div class="tab-pane active" id="comments-logout">
                          <ul class="media-list">
                            @foreach ($comments as $comment)
                            <li class="media">
                                <a class="pull-left" href="#" style="width: 50px;height: 50px;overflow: hidden;border-radius: 25px;padding: 0px;margin-right: 10px;">
                                  <img class="media-object img-circle" src="{{$comment->user->image->path ?? '/image/me.jpg'}}" alt="profile" style="width: 50px;border-radius: 0px;">
                                </a>
                                <div class="media-body">
                                  <div class="well well-lg">
                                      <h5 class="media-heading  reviews">{{$comment->user->name}}
                                        @if ($comment->user_id == Auth::user()->id)
                                            <form style="display: none" method="POST"  id="deletcomment{{$comment->id}}" action="{{ route('posts.comments.destroy' , ['post'=> $comment->post_id , 'comment'=> $comment->id])}}">
                                                <input type="hidden" name="_method"  value="DELETE">
                                                @csrf
                                            </form>
                                            <span style="background: #dc3545;color: white;padding: 3px 10px;border-radius: 5px;margin-left: 50px;">
                                                <a href="" style="text-decoration: none;color: white" onclick="event.preventDefault();
                                                document.getElementById('deletcomment{{$comment->id}}').submit();">Delet</a>
                                            </span>
                                            <span style="background: #0099cc;color: white;padding: 3px 10px;border-radius: 5px;margin-left: 50px;">
                                                <a href="" style="text-decoration: none;color: white" class="edit-bottom" data-id="{{$comment->id}}" data-url-form="{{route('posts.comments.update' , ['post' => $post_id , 'comment' => $comment->id])}}">Edit</a>
                                            </span>
                                        @endif
                                      </h5>

                                      <ul class="media-date  reviews list-inline">
                                        {{$comment->created_at->diffForHumans()}}
                                      </ul>
                                      <p class="media-comment comment-{{$comment->id}}">
                                        {{$comment->comment}}
                                      </p>
                                      <div style="display: inline-flex;align-items: center;">
                                        <a style="margin-right: 10px;" class="btn btn-info btn-circle text-uppercase" data-toggle="collapse" href="#replyOne{{$comment->id}}" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                        <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne{{$comment->id}}"><span class="glyphicon glyphicon-comment"></span> {{$comment->getchildcomments->count() }} comments</a>
                                        <i data-comment_id="{{$comment->id}}" class="fa-solid fa-thumbs-up" style="font-size: 27px;margin-left: 15px;"></i>
                                        <i data-comment_id="{{$comment->id}}" class="fa-solid fa-thumbs-down" style="font-size: 27px;margin-left: 15px;"></i>
                                      </div>
                                  </div>
                                </div>

                                <div class="collapse" id="replyOne{{$comment->id}}">
                                    <ul class="media-list">
                                        @foreach ($comment->getchildcomments as $childcomment)
                                            <li class="media media-replied">
                                                <a class="pull-left" href="#" style="width: 50px;height: 50px;overflow: hidden;border-radius: 25px;padding: 0px;margin-right: 10px;">
                                                <img class="media-object img-circle" src="{{$childcomment->user->image->path ?? '/image/me.jpg'}}" alt="profile" style="width: 50px;border-radius: 0px;">
                                                </a>
                                                <div class="media-body">
                                                    <div class="well well-lg">
                                                        <h5 class="media-heading  reviews"><span class="glyphicon glyphicon-share-alt"></span>{{$childcomment->user->name}}
                                                            @if ($childcomment->user_id == Auth::user()->id)
                                                                <form style="display: none" method="POST"  id="deletcomment{{$childcomment->id}}" action="{{ route('posts.comments.destroy' , ['post'=> $childcomment->post_id , 'comment'=> $childcomment->id])}}">
                                                                    <input type="hidden" name="_method"  value="DELETE">
                                                                    @csrf
                                                                </form>
                                                                <span style="background: #dc3545;color: white;padding: 3px 10px;border-radius: 5px;margin-left: 50px;">
                                                                    <a href="" style="text-decoration: none;color: white" onclick="event.preventDefault();
                                                                    document.getElementById('deletcomment{{$childcomment->id}}').submit();">Delet</a>
                                                                </span>
                                                                <span style="background: #0099cc;color: white;padding: 3px 10px;border-radius: 5px;margin-left: 50px;">
                                                                    <a href="" style="text-decoration: none;color: white" class="edit-bottom" data-id="{{$childcomment->id}}" data-url-form="{{route('posts.comments.update' , ['post' => $post_id , 'comment' => $childcomment->id])}}">Edit</a>
                                                                </span>
                                                            @endif
                                                        </h5>
                                                        <ul class="media-date  reviews list-inline">
                                                            {{$childcomment->created_at->diffForHumans()}}
                                                        </ul>
                                                        <p class="media-comment comment-{{$childcomment->id}}">
                                                            {{$childcomment->comment}}
                                                        </p>
                                                        <div style="display: inline-flex;align-items: center;" >
                                                            <a href="" style="display: none"></a>
                                                            <a href="" style="display: none"></a>
                                                            <i data-comment_id="{{$childcomment->id}}" class="fa-solid fa-thumbs-up" style="font-size: 27px;margin-left: 15px;"></i>
                                                            <i data-comment_id="{{$childcomment->id}}" class="fa-solid fa-thumbs-down" style="font-size: 27px;margin-left: 15px;"></i>

                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach


                                        <li style="background: whitesmoke;margin-left: 110px;padding: 5px 0px 8px 30px;border: 1px solid #0000000d;border-radius: 5px;" >
                                          <form action="{{route('posts_comments_child_store' , ['post_id'=> $comment->post_id])  }}" method="post" class="form-horizontal" id="commentForm" role="form">
                                              <div class="form-group">
                                                  <label for="email" class="col-sm-2 control-label">Comment</label>
                                                  <div class="col-sm-10">
                                                    <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                                                    @csrf
                                                    <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                                    <input type="hidden" name="_method" value="POST">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="uploadMedia" class="col-sm-2 control-label">Upload media</label>
                                                  <div class="col-sm-10">
                                                      <div class="input-group">
                                                        <div class="input-group-addon">http://</div>
                                                        <input type="text" class="form-control" name="uploadMedia" id="uploadMedia">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-offset-2 col-sm-10">
                                                      <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                                                  </div>
                                              </div>
                                          </form>
                                        </li>

                                    </ul>
                                </div>
                              </li>
                            @endforeach


                          </ul>
                      </div>
                      <div class="tab-pane" id="add-comment">
                          <form action="{{route('posts.comments.store' , ['post' => $post_id])}}" method="post" class="form-horizontal" id="commentForm" role="form">
                            @csrf
                            @error('addComment')
                                    <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                  <label for="email" class="col-sm-2 control-label">Comment</label>
                                  <div class="col-sm-10">
                                    <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                                  </div>

                              </div>
                              <div class="form-group">
                                  <label for="uploadMedia" class="col-sm-2 control-label">Upload media</label>
                                  <div class="col-sm-10">
                                      <div class="input-group">
                                        <div class="input-group-addon">http://</div>
                                        <input type="text" class="form-control" name="uploadMedia" id="uploadMedia">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                      <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                                  </div>
                              </div>
                          </form>
                      </div>

                  </div>
              </div>
          </div>
        </div>

      </div>

</div>
@endsection


@section('style')
<link rel="stylesheet" href="{{asset('css/blog_show.css')}}">

@endsection

@section('script')
<script src="{{ asset('js/main_one.js') }}"></script>
<script src="{{asset('js/writeup.js') }}"></script>

@endsection

