<?php

use App\Http\Controllers\Comments;
use App\Mail\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Email;
use App\Http\Controllers\PostController;
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
});


Route::group(['prefix'=>'writeup' , 'namespace'=>'App\Http\Controllers'] , function(){
    Route::get('lists' , 'Blog@lists')->name('writeup.lists')->middleware(['auth','referer']);
    Route::post('store_list' , 'Blog@storelist')->name('writeup.store_list')->middleware(['auth','referer']);
    Route::post('delet_list' , 'Blog@deletlist')->name('writeup.store_list')->middleware(['auth','referer']);
    Route::get('mylists' , 'Blog@mylists')->name('writeup.mylists')->middleware(['auth','referer']);
    Route::get('lists/{list_name}' , 'Blog@showlist')->name('showlist')->middleware(['auth','referer']);
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


Route::get('write' , function(){

})->name('blog.write');

Route::get('write2' , function(){


})->name('blog.write2');




Route::get('link' , function(){
     $post = Post::find(21);
    // $name_delet = end(explode( "/", $post->image()->first()->path));
    // $path_delet = public_path() . '/data/post_image/' . $name_delet;
    // return $path_delet ;
    $arr = explode( "/", $post->image()->first()->path) ;
    return end($arr) ;


});
