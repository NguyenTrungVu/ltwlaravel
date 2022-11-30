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
Route::get('/account','AccountController@index');
Route::get('/register','AccountController@create')->name('register');
Route::post('/register', 'AccountController@store')->name('register.action');
Route::get('/login','AccountController@loginform')->name('login');
Route::post('/login', 'AccountController@login')->name('login.action');
Route::get('/ques', 'QuestionController@index');