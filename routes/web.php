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


Route::get('/login','Admin\AuthController@login')->name('getadminlogin');;
Route::post('/login','Admin\AuthController@postlogin')->name('postadminlogin');
Route::post('/register','Admin\AuthController@postregister')->name('postadminregister');;
Route::get('/register','Admin\AuthController@register');


Route::post('/logout','Admin\AuthController@logout')->name('logout');

Route::get('/dashboard','Admin\AuthController@dashboard')->name('dashboard');

Route::resource('dashboard/category', 'Admin\CategoryController');
Route::resource('dashboard/product', 'Admin\ProductController');






