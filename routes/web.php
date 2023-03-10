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

Auth::routes();

Route::resource('propiedades', App\Http\Controllers\PropiedadeController::class)->middleware('auth');

Route::resource('categorias', App\Http\Controllers\CategoriaController::class);

Route::resource('fotos', App\Http\Controllers\FotoController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::get('/propiedades', function(){
    return view('propiedade.index2');
})->name('index2');*/

Route::get('verPropiedades', [App\Http\Controllers\MostrarPropiedades::class, 'index'])->name('index2');
