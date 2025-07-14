<?php

// use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
})->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::resource('/menu', MenuController::class);
    Route::resource('/transaksi', OrderController::class);
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    // Route::resource('/pembayaran', PembayaranController::class);
    // Route::get('pembayaran/print', [LaporanController::class, 'laporan'])->name('pembayaran.print');

});
