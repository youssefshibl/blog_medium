<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// auth for api
Route::group([
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\Api'

], function ($router) {

    Route::post('login', 'Authcontroller@login');
    Route::post('logout', 'Authcontroller@logout');
    Route::post('refresh', 'Authcontroller@refresh');
    Route::post('me', 'Authcontroller@me');
     Route::get('tokenexpire', 'Authcontroller@tokenexpire')->name('token.expire');

});


Route::group(['namespace' => 'App\Http\Controllers\Api'] ,function(){

    Route::get('/home', 'Apicontroller@index');
    Route::get('/posts', 'Apicontroller@posts');
    Route::get('/lists', 'Apicontroller@lists');
    Route::get('/savelists', 'Apicontroller@savelists');
    Route::get('/notifications', 'Apicontroller@notifications');

    Route::get('/post/{post}', 'Apicontroller@post');





});


