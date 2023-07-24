<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/registro', [Controller::class, 'registro'])->middleware('guest')->name('registro');
Route::post('/registrado', [Controller::class, 'registrar'])->name('register');
Route::get('/login', [Controller::class, 'login'])->middleware('guest')->name('login');
Route::post('/login/save', [Controller::class, 'loguearse'])->name('loggin');
Route::get('/logout', [Controller::class, 'logout'])->middleware('auth')->name('logout');












// Route::get('/DocumentosShow/{id}', [GeneralController::class, 'DocumentosShow'])->middleware('auth')->name('General.DocumentosShow');


