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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'MainPageController@getPage')->name('main');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/article', 'HomeController@article')->name('article');
Route::post('/article', 'HomeController@articleAdd')->name('articleAdd');

Route::get('/user/{var?}', 'HomeController@findUser')->name('findUser');


