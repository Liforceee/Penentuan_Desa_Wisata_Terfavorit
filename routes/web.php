<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\MautController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('user.home');
// });
Route::get('/', [DesaController::class, 'indexHome'])->name('user.home');

Route::get('/petunjuk', function () {
    return view('user.petunjuk');
});

Route::get('/pengembang', function () {
    return view('user.pengembang');
});

Route::get('/maut', [MautController::class, 'index'])->name('maut.index');
Route::post('/maut/hitung', [MautController::class, 'hitung'])->name('maut.hitung');

Route::get('/desa-wisata', [DesaController::class, 'indexUser'])->name('desa_wisata.user');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
});

Route::get('/register', [LoginController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [LoginController::class, 'register'])->middleware('guest');

Route::middleware(['auth', 'can:admin'])->group(function (){
    Route::resource('users', UserController::class);

    Route::get('/adminhome', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/perhitungan', [DesaController::class, 'indexadmin'])->name('perhitungan');
    Route::resource('kriteria', KriteriaController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('desa_wisata', DesaController::class);

});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

