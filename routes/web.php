<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/tampil-produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/tambah-produk', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/simpan-produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/edit-produk/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/update-produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/hapus-produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::get('/detil-produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

Route::get('/', function () {
    return view('welcome');
});
