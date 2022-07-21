<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/login', "Auth\LoginController@getLogin")->name('login');
Route::post('/login', "Auth\LoginController@postLogin")->name('login');
Route::get('/logout', "Auth\LoginController@getLogout")->name('logout');

Route::match(['get', 'post'], 'add', 'UserController@add')->name('Route_BackEnd_User_Add');
Route::get('/test', 'UserController@getList');
Route::get('/sinhvien', 'UserController@getList');
// Route::get('/dangky', function(){
//     return view('formRegister');
// });