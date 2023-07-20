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

Route::get('/login', function () {
    return view('login');
});


Route::get('/login', [Controller::class, 'index'])->name('login');
Route::post('/registrado', [Controller::class, 'registrar'])->name('register');












// Route::get('/DocumentosShow/{id}', [GeneralController::class, 'DocumentosShow'])->middleware('auth')->name('General.DocumentosShow');


