
@extends('pages_.assembly')

@section('body-content')

<div class="middle_body" style="  width: 850px; margin-bottom: 30px">
    <div class="container" style="width: 100%;">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1" id="logout">
              <div class="page-header">
                  <h3 class="reviews"> Comments On </h3>

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
                                      <h5 class="media-heading text-uppercase reviews">{{$comment->user->name}} </h5>
                                      <ul class="media-date text-uppercase reviews list-inline">
                                        <li class="dd">22</li>
                                        <li class="mm">09</li>
                                        <li class="aaaa">2014</li>
                                      </ul>
                                      <p class="media-comment">
                                        {{$comment->comment}}
                                      </p>
                                      <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                      <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne"><span class="glyphicon glyphicon-comment"></span> 2 comments</a>
                                  </div>
                                </div>
                                {{-- <div class="collapse" id="replyOne">
                                    <ul class="media-list">
                                        <li class="media media-replied">
                                            <a class="pull-left" href="#" style="width: 50px;height: 50px;overflow: hidden;border-radius: 25px;padding: 0px;margin-right: 10px;">
                                              <img class="media-object img-circle" src="/image/me.jpg" alt="profile" style="width: 50px;border-radius: 0px;">
                                            </a>
                                            <div class="media-body">
                                              <div class="well well-lg">
                                                  <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> The Hipster</h4>
                                                  <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                  </ul>
                                                  <p class="media-comment">
                                                    Nice job Maria.
                                                  </p>
                                                  <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                              </div>
                                            </div>
                                        </li>
                                        <li class="media media-replied" id="replied">
                                            <a class="pull-left" href="#" style="width: 50px;height: 50px;overflow: hidden;border-radius: 25px;padding: 0px;margin-right: 10px;">
                                              <img class="media-object img-circle" src="/image/me.jpg" alt="profile" style="width: 50px;border-radius: 0px;">
                                            </a>
                                            <div class="media-body">
                                              <div class="well well-lg">
                                                  <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Mary</h4></h4>
                                                  <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                  </ul>
                                                  <p class="media-comment">
                                                    Thank you Guys!
                                                  </p>
                                                  <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                              </div>
                                            </div>
                                        </li>
                                        <li style="background: whitesmoke;margin-left: 110px;padding: 5px 0px 8px 30px;border: 1px solid #0000000d;border-radius: 5px;" >
                                          <form action="#" method="post" class="form-horizontal" id="commentForm" role="form">
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
                                        </li>

                                    </ul>
                                </div> --}}
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
<script src="{{asset('js/writeup.js') }}"></script>
@endsection




