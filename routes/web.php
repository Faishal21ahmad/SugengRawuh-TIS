<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardRMController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MejaRMController;
use App\Http\Controllers\MenuRMController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
use App\Models\MejaRM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PharIo\Manifest\Url;

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


Route::get('/', function () {
    return view('home', [
        'title' => ''
    ]);
});

// middleware('guest') ==> hanya dapat di akses oleh user yang belom login 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// middleware('auth') ==> hanya dapat di akses oleh user yang sudah login 
Route::get('/dashboard', [DashboardRMController::class, 'index'])->middleware('auth');
// Route::get('/menu', [MenuRMController::class, 'index'])->middleware('auth');

Route::resource('/menu', MenuRMController::class)->middleware('auth');
Route::resource('/meja', MejaRMController::class)->middleware('auth');

Route::get('/meja/downloadqr/{meja:id}', [MejaRMController::class, 'download']);
Route::resource('/kategori', KategoriController::class)->middleware('auth');

Route::resource('/pembayaran', PembayaranController::class)->middleware('auth');

Route::get('/pesanan/proses', [PesananController::class, 'proses'])->middleware('auth');
Route::get('/pesanan/selesai', [PesananController::class, 'selesai'])->middleware('auth');
Route::get('/pesan/{meja:id}/{adminrm_id:rm_id}', [PesananController::class, 'create']);
Route::resource('/pesanan', PesananController::class)->middleware('auth');

Route::get('/addcart/{menu:id}', [CartController::class, 'addcart']);
Route::get('/editplusqty/{menu:id}', [CartController::class, 'pluscart']);
Route::get('/editminqty/{menu:id}', [CartController::class, 'minuscart']);
Route::resource('/pesan', CartController::class);

Route::get('/success', [CartController::class, 'success']);
