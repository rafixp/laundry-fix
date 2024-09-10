<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;


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

/* Global Login */
Route::get('/login', [authController::class, 'view']);
Route::post('/login', [authController::class, 'login']);

/* Route Admin */
Route::get('/admin/home', [adminController::class, 'home']);
Route::get('/admin/paket', [adminController::class, 'paket']);
Route::get('/admin/outlet', [adminController::class, 'outlet']);
Route::get('/admin/member', [adminController::class, 'member']);
Route::get('/admin/user', [adminController::class, 'user']);
Route::get('/admin/transaksi', [adminController::class, 'transaksi']);

Route::get('/admin/paket/show/{id}', [adminController::class, 'showPaket']);
Route::post('/admin/paket/tambah', [adminController::class, 'tambahPaket']);
Route::post('/admin/paket/edit/{id}', [adminController::class, 'editPaket']);
Route::get('/admin/paket/hapus/{id}', [adminController::class, 'hapusPaket']);

Route::get('/admin/outlet/show/{id}', [adminController::class, 'showOutlet']);
Route::post('/admin/outlet/tambah', [adminController::class, 'tambahOutlet']);
Route::post('/admin/outlet/edit/{id}', [adminController::class, 'editOutlet']);
Route::get('/admin/outlet/hapus/{id}', [adminController::class, 'hapusOutlet']);

Route::get('/admin/member/show/{id}', [adminController::class, 'showMember']);
Route::post('/admin/member/tambah', [adminController::class, 'tambahMember']);
Route::post('/admin/member/edit/{id}', [adminController::class, 'editMember']);
Route::get('/admin/member/hapus/{id}', [adminController::class, 'hapusMember']);

Route::get('/admin/user/show/{id}', [adminController::class, 'showUser']);
Route::post('/admin/user/edit/{id}', [adminController::class, 'editUser']);
Route::post('/admin/user/tambah', [adminController::class, 'tambahUser']);
Route::get('/admin/user/hapus/{id}', [adminController::class, 'hapusUser']);

Route::post('/admin/transaksi/tambah', [adminController::class, 'tambahTransaksi']);
Route::get('/admin/transaksi/hapus/{id}', [adminController::class, 'hapusTransaksi']);
Route::get('/admin/transaksi/show/{id}', [adminController::class, 'showTransaksi']);
Route::post('/admin/transaksi/konfirmasi/{id}', [adminController::class, 'konfirmasiTransaksi']);
