<?php


use App\Http\Middleware\CheckUserNameLength;

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

Route::get('ping', 'AppController@ping');

Route::get('shout/{userName}/limit={limit}', 'AppController@shout')->middleware(CheckUserNameLength::class);;
