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
Route::get('/admin/pengguna', [adminController::class, 'pengguna']);

Route::post('/admin/paket/tambah', [adminController::class, 'tambahPaket']);
Route::get('/admin/paket/show/{id}', [adminController::class, 'showPaket']);
Route::post('/admin/paket/edit/{id}', [adminController::class, 'editPaket']);

Route::post('/admin/outlet/tambah', [adminController::class, 'tambahOutlet']);
Route::get('/admin/outlet/show/{id}', [adminController::class, 'showOutlet']);
Route::post('/admin/outlet/edit/{id}', [adminController::class, 'editOutlet']);

Route::post('/admin/member/tambah', [adminController::class, 'tambahMember']);
Route::post('/admin/member/edit/{id}', [adminController::class, 'editMember']);
Route::get('/admin/member/show/{id}', [adminController::class, 'showMember']);

