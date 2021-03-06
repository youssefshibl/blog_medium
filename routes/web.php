<?php

use App\Console\Commands\Expiration;
use App\Http\Controllers\Chat\Maincontroller;
use App\Http\Controllers\Comments;
use App\Mail\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Email;
use App\Http\Controllers\Files\Getfiles;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PayMent\FatoorahController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SocialAuth;
use App\Http\Controllers\SocialAuthLogin;
use App\Models\Post;
use App\Models\User;
use App\Services\GitHub;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('beforelogin', 'App\Http\Controllers\PostController@beforelogin')->name('beforelogin');

Route::get('/', 'App\Http\Controllers\PostController@index')->name('home');
// for error which get if refresh page after log out  "to logout you should be login "
Route::get('logout', function () {
    return view('home_page');
})->name('logout_');
// POst route
Route::resource('posts', 'App\Http\Controllers\PostController');

// For the ckeditor upload photos
//Route::post('ckeditor/image_upload', 'App\Http\Controllers\CKEditorController@upload')->name('upload');
Auth::routes();
//Auth::routes(['verify'=>true]);  --> for verify email address



// Make group of route to emails
Route::group(['prefix' => 'email', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('verifyemail', 'Email@verify_email');
    Route::get('verifyemail/{key}', 'Email@verify_email_check')->name('verify_email_check');
});

// route for user_data
Route::group(['prefix' => 'me', 'middleware' => 'auth'], function () {

    Route::get('account', function () {
        return view('me.account');
    })->name('me.account');

    Route::get('setting', function () {
        return view('me.setting');
    })->name('me.setting');
});


// route for any data get from frontend
Route::group(['prefix' => 'ajax', 'namespace' => 'App\Http\Controllers', 'middleware' => ['auth', 'referer']], function () {
    Route::post('account', 'Ajax@account');
    Route::post('writeup', 'Ajax@writeup');
    Route::post('delet_image' , 'Ajax@delet_image');
    Route::post('store_writeup' , 'PostController@store') ;
    Route::post('get_lists' , 'Ajax@getlists');
    Route::post('makenewlist', 'Ajax@makenewlist');
    Route::get('savepost' , 'Ajax@savepost');
    Route::post('delet_save_list' , 'Ajax@delet_save_list');
    Route::post('unsave_post' , 'Ajax@unsave_post');
    Route::post('make_like' , 'Ajax@makelike');
    Route::post('dislike' , 'Ajax@dislike');
    Route::post('notifications' , 'Ajax@notifications');
    Route::get('get_more_posts/{posts}' , 'Ajax@get_more_posts')->withoutMiddleware(['auth']);

});

// route of list of posts and make writeup
Route::group(['prefix'=>'writeup' , 'namespace'=>'App\Http\Controllers'] , function(){
    Route::get('lists' , 'Blog@lists')->name('writeup.lists')->middleware(['auth','referer']);
    Route::post('store_list' , 'Blog@storelist')->name('writeup.store_list')->middleware(['auth','referer']);
    Route::post('delet_list' , 'Blog@deletlist')->name('writeup.store_list')->middleware(['auth','referer']);
    Route::get('mylists' , 'Blog@mylists')->name('writeup.mylists')->middleware(['auth','referer']);
    Route::get('/lists/{list_name}' , 'Blog@showlist')->name('showlist')->middleware(['auth','referer']);
    Route::get('new_writeup' , 'Blog@showwriteup')->name('writeup.create')->middleware(['auth','referer']);
    Route::get('notifications' , 'Blog@notifications')->name('writeup.notifications');
    Route::get('/tags/{tag}' , 'Blog@show_posts_tag')->name('tags');

});

//save posts in save lists
Route::group(['prefix'=>'save' , 'namespace'=>'App\Http\Controllers'] , function(){

    Route::get('list' , 'SavePosts@index')->name('save.show');
    Route::get('list/{list}' , 'SavePosts@show')->name('posts.in.save');
});

// comments route
Route::resource('posts.comments' , Comments::class);
Route::post('{post_id}/posts_comments_child_store' , [Comments::class , 'storechildcomment'])->name('posts_comments_child_store');

//login by social media acount
Route::get('/auth/{serv}/redirect', [SocialAuthLogin::class , 'redirect'])->name('social.redirect');
Route::get('/auth/{serv}/callback', [SocialAuthLogin::class , 'callback'])->name('social.callback');


// profile route
Route::group(['prefix' => 'profile', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('{username}', 'ProfileController@index')->name('profile');
    Route::get('{username}/posts', 'ProfileController@posts')->name('profile.posts');
    Route::get('{username}/lists/{list_name}', 'ProfileController@showlist')->name('profile.showlist');
    Route::get('likes/show', 'ProfileController@showlikes')->name('profile.likes');
    Route::get('comments/show', 'ProfileController@showcomments')->name('profile.comments');
    Route::get('following/show', 'ProfileController@showfollowing')->name('profile.following');
    Route::get('followers/show', 'ProfileController@showfollowers')->name('profile.followers');
});


// make following to user and unfollowing to user
Route::get('makefollow/{user_id}', [FollowController::class , 'makefollow'])->name('makefollow');
Route::get('makeunfollow/{user_id}', [FollowController::class , 'makeunfollow'])->name('makeunfollow');


// search
Route::get('search', [SearchController::class , 'index'])->name('search');


// route for pdf files
Route::group(['prefix'=>'pdf'] , function(){
    Route::get('post/{id}' , [PdfController::class , 'postpdf'])->name('pdf.index');
});

// route of admin panel
Route::group(['prefix'=>'admin' , 'namespace' => 'App\Http\Controllers\Admin'  ] , function(){
     // ------------------------ user route --------------------------
        Route::get('/' , 'AdminmainController@showlogin')->name('admin.index');
        Route::post('/login' , 'AdminmainController@login')->name('admin.login');
        Route::post('/logout' , 'AdminmainController@logout')->name('admin.logout');
        Route::get('/dashboard' , 'AdminmainController@dashboard')->name('admin.dashboard');
        Route::get('users/show' , 'AdminmainController@showusers')->name('admin.users');
        Route::get('/users/search' , 'AdminmainController@searchusers')->name('admin.users.search');
        Route::get('/users/delete/{id}' , 'AdminmainController@deleteuser')->name('admin.users.delete');
        Route::get('/users/showprofile/{id}' , 'AdminmainController@showprofile')->name('admin.users.showprofile');
        Route::get('/users/lists/{id}' , 'AdminmainController@showlists')->name('admin.users.lists');
        Route::get('/users/{id}/posts' , 'AdminmainController@showposts')->name('admin.users.posts');
        Route::get('/users/{username}/lists/{listname}' , 'AdminmainController@showlist')->name('admin.users.lists.posts');
        Route::delete('/users/post/{post}/delete' , 'AdminmainController@deletepost')->name('admin.post.delete');
        Route::get('/users/post/show/{post}' , 'AdminmainController@showpost')->name('admin.post.show');
        Route::get('/users/{username}/likes' , 'AdminmainController@showlikes')->name('admin.likes.show');
        Route::get('/users/{username}/comments', 'AdminmainController@showcomments')->name('admin.comments.show');
        Route::get('/users/posts/{post_id}/comments' , 'AdminmainController@showcomment')->name('admin.posts.comments');
        Route::delete('/user/comment/{id}/delete' , 'AdminmainController@deletecomment')->name('admin.comment.delete');
        Route::get('/users/post/{post_id}/comments/{comment_id}/focus' , 'AdminmainController@focuscomment')->name('admin.comment.focus');
        Route::get('/users/following/{username}' , 'AdminmainController@showfollowing')->name('admin.following.show');
        Route::get('/users/followers/{username}' , 'AdminmainController@showfollowers')->name('admin.followers.show');
        Route::get('/users/savelists/{username}' , 'AdminmainController@showsavelists')->name('admin.savelists.show');
        Route::get('/users/savelists/{username}/{listname}' , 'AdminmainController@showpostssavelist')->name('admin.savelists.show.posts');

    // ------------------------------- posts route ----------------------------
    Route::get('/posts/show' , 'AdminmainController@posts_showposts')->name('admin.posts.show');
    Route::get('/posts/search' , 'AdminmainController@posts_searchposts')->name('admin.posts.search');
    // -------------------------------- others -----------------------------------------
    Route::get('/others/show' , 'AdminmainController@others_show')->name('admin.others.show');
    Route::post('others/tags/add' , 'AdminmainController@addtag')->name('admin.others.tags.add');

    //------------------------------- admin ---------------------------------------------------
    Route::get('profile' , 'AdminmainController@AdminProfile')->name('admin.profile');
    Route::post('saveprofile' , 'AdminmainController@AdminProfileUpdate')->name('admin.saveprofile');
    Route::post('addnewadmin' , 'AdminmainController@addnewadmin')->name('admin.addnewadmin');


    Route::get('/test' , 'AdminmainController@test')->name('admin.test');

});

// route for get any file from server like sound or any file
Route::group(['prefix'=> 'files'] , function(){
    Route::get('/{filename}' , [Getfiles::class , 'getfiles']);
});



// route of chat
Route::group(['prefix'=> 'chat'] , function(){
    Route::get('/' , [Maincontroller::class , 'index'])->name('chat.index');
    Route::post('/sendmessage' , [Maincontroller::class , 'sendmessage'])->name('chat.sendmessage');
    Route::post('/getmessages', [Maincontroller::class , 'getmessages'])->name('chat.getmessages');
    Route::post('/showlastmessages' , [Maincontroller::class , 'showlastmessages'])->name('chat.showlastmessages');
});



Route::get('payment' , [FatoorahController::class , 'payorder'])->name('payment');
Route::get('payment/success/{id}' , [FatoorahController::class , 'success'])->name('payment.success');

//---------------------test------------------------------------
Route::get('url' , function(){
    $post = post::find(39);
    $tags = $post->tags;
    $new = $tags->map(function($tag){
        return $tag->name;
    });
    return $new;
});


Route::get('test' , function(){
    $send = new Client();
    $response = $send->request('GET', 'http://blog.com/url');
    return  $response->getBody();

});



