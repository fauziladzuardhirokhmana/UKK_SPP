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

Route::post('/kelas/create', [App\Http\Controllers\KelasController::class, 'create']);
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'read']);
Route::patch('/kelas/edit/{id_kelas}', [App\Http\Controllers\KelasController::class, 'update']);
Route::delete('/kelas/delete/{id_kelas}', [App\Http\Controllers\KelasController::class, 'delete']);

Route::post('/spp/create', [App\Http\Controllers\SPPController::class, 'create']);
Route::get('/spp', [App\Http\Controllers\SPPController::class, 'read']);
Route::patch('/spp/edit/{id_spp}', [App\Http\Controllers\SPPController::class, 'update']);
Route::delete('/spp/delete/{id_spp}', [App\Http\Controllers\SPPController::class, 'delete']);

Route::post('/siswa/create', [App\Http\Controllers\SiswaController::class, 'create']);
Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'read']);
Route::patch('/siswa/edit/{nis}', [App\Http\Controllers\SiswaController::class, 'update']);
Route::delete('/siswa/delete/{nis}', [App\Http\Controllers\SiswaController::class, 'delete']);

Route::post('/petugas/create', [App\Http\Controllers\PetugasController::class, 'create']);
Route::get('/petugas', [App\Http\Controllers\PetugasController::class, 'read']);
Route::patch('/petugas/edit/{nip}', [App\Http\Controllers\PetugasController::class, 'update']);
Route::delete('/petugas/delete/{nip}', [App\Http\Controllers\PetugasController::class, 'delete']);

Route::post('/transaksi/create', [App\Http\Controllers\TransaksiController::class, 'create']);
Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'read']);
Route::patch('/transaksi/edit/{no_struk}', [App\Http\Controllers\TransaksiController::class, 'update']);
Route::delete('/transaksi/delete/{no_struk}', [App\Http\Controllers\TransaksiController::class, 'delete']);
Route::get('/transaksi/file/{nis}/{nama_file}', [App\Http\Controllers\TransaksiController::class, 'getFile']);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'history']);
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);