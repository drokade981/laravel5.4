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

Route::group(['namespace'=>'user'],function()
{
    Route::get('/user', 'User@index')->middleware(['auth']);
    Route::get('/userList', 'User@userList');
    Route::get('/insert', 'User@insert');
    //Route::match(array('GET', 'POST'), '/insert', 'User@insert');

});
//Route::resource('post', 'APIController');


//Route::controller('user','user/User');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
