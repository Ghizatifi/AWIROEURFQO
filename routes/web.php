<?php

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


Route::get('/dashbord',function(){
	return view('layout.master');
});

Route::get('/','LoginController@getLogin');
Route::post('/login','LoginController@postLogin');
Route::get('/logout','LoginController@getLogout');
Route::group(['middleware'=>['authen']],function(){

    Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
    Route::get('/logout','LoginController@getLogout');
    
    });