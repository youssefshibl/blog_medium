<?php

use App\Console\Commands\Expiration;
use App\Http\Controllers\Comments;
use App\Mail\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Email;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialAuth;
use App\Http\Controllers\SocialAuthLogin;
use App\Models\Post;
use App\Models\User;
use App\Services\GitHub;
use Illuminate\Http\Response;
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
});


Route::group(['prefix'=>'writeup' , 'namespace'=>'App\Http\Controllers'] , function(){
    Route::get('lists' , 'Blog@lists')->name('writeup.lists')->middleware(['auth','referer']);
    Route::post('store_list' , 'Blog@storelist')->name('writeup.store_list')->middleware(['auth','referer']);
    Route::post('delet_list' , 'Blog@deletlist')->name('writeup.store_list')->middleware(['auth','referer']);
    Route::get('mylists' , 'Blog@mylists')->name('writeup.mylists')->middleware(['auth','referer']);
    Route::get('/lists/{list_name}' , 'Blog@showlist')->name('showlist')->middleware(['auth','referer']);
    Route::get('new_writeup' , function(){
        return view('blog.main');
    })->name('writeup.create')->middleware(['auth','referer']);

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
});


// make following to user and unfollowing to user
Route::get('makefollow/{user_id}', [FollowController::class , 'makefollow'])->name('makefollow');
Route::get('makeunfollow/{user_id}', [FollowController::class , 'makeunfollow'])->name('makeunfollow');


Route::get('test', function(){

    $users = auth()->user()->following->pluck('id')->toArray();
    //$users = User::where('id',Auth::user()->id)->with('following:id')->first()->following->pluck('id')->toArray();
    return $users ;
    
});



