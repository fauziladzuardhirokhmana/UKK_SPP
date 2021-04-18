<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/kelas', [App\Http\Controllers\KelasController::class, 'create']);
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'read']);
Route::patch('/kelas/{id_kelas}', [App\Http\Controllers\KelasController::class, 'update']);
Route::delete('/kelas/{id_kelas}', [App\Http\Controllers\KelasController::class, 'delete']);

Route::post('/spp', [App\Http\Controllers\SPPController::class, 'create']);
Route::get('/spp', [App\Http\Controllers\SPPController::class, 'read']);
Route::patch('/spp/{id_spp}', [App\Http\Controllers\SPPController::class, 'update']);
Route::delete('/spp/{id_spp}', [App\Http\Controllers\SPPController::class, 'delete']);

Route::post('/siswa', [App\Http\Controllers\SiswaController::class, 'create']);
Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'read']);
Route::patch('/siswa/{nis}', [App\Http\Controllers\SiswaController::class, 'update']);
Route::delete('/siswa/{nis}', [App\Http\Controllers\SiswaController::class, 'delete']);

Route::post('/petugas', [App\Http\Controllers\PetugasController::class, 'create']);
Route::get('/petugas', [App\Http\Controllers\PetugasController::class, 'read']);
Route::patch('/petugas/{nip}', [App\Http\Controllers\PetugasController::class, 'update']);
Route::delete('/petugas/{nip}', [App\Http\Controllers\PetugasController::class, 'delete']);

Route::post('/transaksi', [App\Http\Controllers\TransaksiController::class, 'create']);
Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'read']);
Route::patch('/transaksi/{no_struk}', [App\Http\Controllers\TransaksiController::class, 'update']);
Route::delete('/transaksi/{no_struk}', [App\Http\Controllers\TransaksiController::class, 'delete']);
Route::get('/transaksi/file/{nis}/{nama_file}', [App\Http\Controllers\TransaksiController::class, 'getFile']);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'history']);
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);