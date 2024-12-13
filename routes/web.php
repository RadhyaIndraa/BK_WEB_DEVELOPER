<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class,'index'])->name('login');
    Route::post('/', [SesiController::class,'login']);
});
Route::get('/home', function() {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [AdminController::class,'index']);
    Route::get('/dokter', [AdminController::class,'dokter']);
    Route::get('/pasien', [AdminController::class,'pasien']);
    Route::get('/logout', [SesiController::class,'logout']);
});

//dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//kelola dokter
Route::resource('dokters', DokterController::class);
//kelola pasien
Route::resource('pasien', PasienController::class);
//kelola poli
Route::resource('polis', PoliController::class);
//kelola obat
Route::resource('obat', ObatController::class);
