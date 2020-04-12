<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->namespace('Auth\Admin')->group(function(){

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');

});

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::get('dashboard','adminDashboardController@index');
});

Route::prefix('user')->namespace('User')->group(function(){
    Route::get('dashboard','userDashboardController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
