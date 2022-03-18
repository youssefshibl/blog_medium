<?php

use App\Mail\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\PagesController@index')->name('home');
Route::get('/about', 'App\Http\Controllers\PagesController@about')->name('about');
Route::get('/services', 'App\Http\Controllers\PagesController@services')->name('services');
Route::get('/test', 'App\Http\Controllers\PagesController@services');
Route::resource('posts', 'App\Http\Controllers\PostController');


 Route::post('ckeditor/image_upload', 'App\Http\Controllers\CKEditorController@upload')->name('upload');
//Auth::routes();
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);



Route::get('/send' , function(){
    
    
    Mail::to('youssefshibl00@gmail.com')->send(new Order);

    } );



