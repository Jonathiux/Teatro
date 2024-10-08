<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('teatro', App\Http\Controllers\TeatrosController::class)
    ->except(['show'])
    ->middleware('auth');

Route::get('/delete/{teatro_id}', [
    'as' => 'delete',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\TeatrosController@delete'
]);
