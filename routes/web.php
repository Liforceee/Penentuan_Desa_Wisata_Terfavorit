<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\MautController;
use App\Http\Controllers\KriteriaController;

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
    return view('user.home');
});

Route::get('/petunjuk', function () {
    return view('user.petunjuk');
});

Route::get('/pengembang', function () {
    return view('user.pengembang');
});

Route::get('adminhome', function () {
    return view('layout_admin.index');
});

Route::resource('kriteria', KriteriaController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('desa_wisata', DesaController::class);

Route::get('/desa-wisata', [DesaController::class, 'indexUser'])->name('desa_wisata.user');

Route::get('/maut', [MautController::class, 'index'])->name('maut.index');
Route::post('/maut/hitung', [MautController::class, 'hitung'])->name('maut.hitung');


