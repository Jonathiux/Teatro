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

Route::get('teatro/imprimir/{teatro_id}', [ 
    'as' => 'imprimirTeatros',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\TeatrosController@imprimir']);

Route::resource('obra', App\Http\Controllers\ObraController::class)
    ->except(['show'])
    ->middleware('auth');

Route::resource('funcion', App\Http\Controllers\FuncionController::class)
    ->except(['show'])
    ->middleware('auth');

Route::get('teatro/delete/{teatro_id}', [
    'as' => 'deleteTeatro',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\TeatrosController@delete'
]);

Route::get('funcion/delete/{funcion_id}', [
    'as' => 'deleteFuncion',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\FuncionController@delete'
]);

Route::get('obra/delete/{obra_id}', [
    'as' => 'deleteObra',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\ObraController@delete'
]);


Route::get('/imprimir', [App\Http\Controllers\GeneradorController::class, 'imprimir'])->name('imprimir');
