<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\PemainController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\PencetakGolController;
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
// Route::get('/search/{search}', function ($search) {
//     return view('dashboard');
// })->where('search', '.*');

Route::get('/home', function(){
    return view('home');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/get-list-tim-page', [TimController::class, 'index'])->name('getListTimPage');
Route::get('/add-tim-page', [TimController::class, 'create'])->name('addTimPage');
Route::post('/store-tim', [TimController::class, 'store'])->name('storeTim');
Route::patch('/update-tim',[TimController::class, 'update'])->name('updateTim');
Route::get('/delete-tim/{id}',[TimController::class, 'destroy'])->name('deleteTim');

Route::get('/get-list-pemain-page', [PemainController::class, 'index'])->name('getListPemainPage');
Route::get('/add-pemain-page', [PemainController::class, 'create'])->name('addPemainPage');
Route::post('/store-pemain', [PemainController::class, 'store'])->name('storePemain');
Route::patch('/update-pemain',[PemainController::class, 'update'])->name('updatePemain');
Route::get('/delete-pemain/{id}',[PemainController::class, 'destroy'])->name('deletePemain');

Route::get('/get-list-jadwal-page', [JadwalController::class, 'index'])->name('getListJadwalPage');
Route::get('/add-jadwal-page', [JadwalController::class, 'create'])->name('addJadwalPage');
Route::post('/store-jadwal', [JadwalController::class, 'store'])->name('storeJadwal');
Route::patch('/update-jadwal',[JadwalController::class, 'update'])->name('updateJadwal');

Route::get('/add-hasil-page', [HasilController::class, 'create'])->name('addHasilPage');
Route::post('/store-hasil', [HasilController::class, 'store'])->name('storeHasil');
Route::get('/edit-hasil/{id}', [HasilController::class, 'edit'])->name('editHasil');

Route::post('/add-pencetak-gol', [PencetakGolController::class, 'store'])->name('storePencetakGol');
Route::patch('/update-pencetak-gol', [PencetakGolController::class, 'update'])->name('updatePencetakGol');
