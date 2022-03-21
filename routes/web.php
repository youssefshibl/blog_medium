<?php

use App\Mail\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Email;
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

// Route::get('/about', 'App\Http\Controllers\PagesController@about')->name('about');
// Route::get('/services', 'App\Http\Controllers\PagesController@services')->name('services');
// Route::get('/test', 'App\Http\Controllers\PagesController@services');
// POst route
Route::resource('posts', 'App\Http\Controllers\PostController');

// For the ckeditor upload photos
//Route::post('ckeditor/image_upload', 'App\Http\Controllers\CKEditorController@upload')->name('upload');
Auth::routes();

//Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
// Make group of route to emails

Route::group(['prefix' => 'email', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('verifyemail', 'Email@verify_email');
    Route::get('verifyemail/{key}', 'Email@verify_email_check')->name('verify_email_check');
});












// Route::get('/send', function () {


//     Mail::to('youssefshibl00@gmail.com')->send(new Order);
// });



Route::get('testone', function () {
    // $user = User::find(Auth::user()->id);

    //   $user->Verifiedes()->create(['verified_token'=> 'ddddddddddddddddd']);
    //   return Auth::user()->Verifiedes ;
    return User::with('Verifiedes')->find(Auth::user()->id);
});
