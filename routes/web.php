<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\BarangController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PelangganController;

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

Route::get('/', [DashboardController::class,'index']);

Route::middleware('auth')->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard');
        Route::get('/dashboard-penerimaan-barang', 'penerimaan_barang');
        Route::get('/dashboard-pengeluaran-barang', 'pengeluaran_barang');
        Route::get('/dashboard-barang', 'barang');
        Route::get('/dashboard-input-barang', 'pageInputBarang');
        Route::get('/dashboard-laporan', 'pageLaporan');
        Route::post('/dashboard-laporan-penerimaan', 'exportPDFpenerimaan');
        Route::post('/dashboard-laporan-pengeluaran', 'exportPDFpengeluaran');
        Route::post('/dashboard-logout', 'logout')->name('logout');
    });

    Route::controller(BarangController::class)->group(function () {
        Route::post("/dashboard-kategori", 'postKodeBarang');
        Route::post("/dashboard-input-barang", 'postBarang');
        Route::post("/dashboard-penerimaan-barang", 'postPenerimaanBarang');
        Route::post("/dashboard-pengeluaran-barang", 'postPengeluaranBarang');
        Route::get("/dashboard-barang-edit/{id}", 'editBarang');
        Route::delete("/dashboard-barang-delete/{id}", 'deleteBarang');
        Route::put("/dashboard-barang-edit/{id}", 'aksiEditBarang');
    });

    Route::controller(PelangganController::class)->group(function(){
        Route::get('/dashboard-users', 'index');
        Route::get('/dashboard-users-tambah', 'tambah');
        Route::post('/dashboard-users-tambah', 'create');
        Route::delete('/dashboard-user-delete/{id}', 'destroy');
        Route::get('/dashboard-user-edit/{id}', 'edit');
        Route::put('/dashboard-user-edit/{id}', 'update');
    });
});

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register');
        Route::post('/login', 'aksiLogin');
        Route::post('/register', 'aksiRegister')->name('aksiLogin');
    });
});
