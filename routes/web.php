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

Route::middleware(['auth'])->group(function () {
    Route::resource('user', 'App\Http\Controllers\UserController');
    Route::resource('services', 'App\Http\Controllers\ServiceController');
    Route::get('services/{service}/delete', 'App\Http\Controllers\ServiceController@delete')->name('services.delete');
    Route::resource('sitters', 'App\Http\Controllers\SitterController')->except([
        'index', 'show'
    ]);
    Route::get('sitters/{sitter}/request','App\Http\Controllers\SitterController@request')->name('sitters.request');
    Route::post('sitters/{sitter}/photo','App\Http\Controllers\SitterController@imageAdd')->name('sitters.photo');
    Route::resource('pets', 'App\Http\Controllers\PetController')->except([
        'index','show'
    ]);
    Route::get('pets/{pet}/delete', 'App\Http\Controllers\PetController@delete')->name('pets.delete');

    Route::resource('reviews', 'App\Http\Controllers\ReviewController')->only('store');
    Route::get('pets/{pet}/sit','App\Http\Controllers\PetController@sit')->name('pets.sit');
    Route::get('orders','App\Http\Controllers\OrderController@index')->name('orders.index');
    Route::get('orders/{order}/confirm','App\Http\Controllers\OrderController@confirm')->name('orders.confirm');
    Route::post('orders/{order}/files','App\Http\Controllers\FileController@store')->name('file.store');
});

Route::resource('pets', 'App\Http\Controllers\PetController')->only([
    'index','show'
]);
Route::resource('sitters', 'App\Http\Controllers\SitterController')->only([
    'show'
]);
