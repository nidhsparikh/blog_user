<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUser;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    Route::get('/superadmin', 'AdminController@index')->name('superadmin');
    Route::resource('users','AdminController');
    Route::post('update_admin', 'AdminController@update_admin')->name('users.update_admin');
});
Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin', 'HomeController@index')->name('admin');
});
Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});
// Route::get('/home', 'HomeController@index')->name('home');
// Route::group(['middleware'=>['auth','checkUser']],function(){
//     Route::get('/home', 'HomeController@index')->name('home');
// });

