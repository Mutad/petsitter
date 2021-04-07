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

Route::get('/login', 'App\Http\Controllers\AuthController@showLogin')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::get('/register', 'App\Http\Controllers\AuthController@showRegister')->name('register');
Route::post('/register', 'App\Http\Controllers\AuthController@register');

Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

Route::prefix('/pets')->group(function () {
    Route::get('/', 'App\Http\Controllers\PetController@index');
    Route::get('/{pet}', 'App\Http\Controllers\PetController@show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', 'App\Http\Controllers\UserController@profile');
});