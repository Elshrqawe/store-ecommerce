<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// prefix => admin  Ali Root is complete

Route::group(['namespace' =>'Dashboard' , 'middleware' => 'auth:admin' , 'prefix' => 'admin'],function (){

    Route::get('/','DashboardController@index') ->name('admin.dashboard');
});



Route::group(['namespace' =>'Dashboard' , 'middleware' => 'guest:admin' , 'prefix' => 'admin'],function (){

    Route::get('/login' ,'LoginController@login')->name('admin.login');

    Route::post('/login' ,'LoginController@postLogin')->name('admin.post.login');



});


