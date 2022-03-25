<?php

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
});


Route::group(['prefix'=>'writeup' , 'namespace'=>'App\Http\Controllers'] , function(){
    Route::get('lists' , 'Blog@lists')->name('writeup.lists');
    Route::post('store_list' , 'Blog@storelist')->name('writeup.store_list');
    Route::post('delet_list' , 'Blog@deletlist')->name('writeup.store_list');

});

Route::get('write' , function(){
    return view('blog.main');
})->name('blog.write');
