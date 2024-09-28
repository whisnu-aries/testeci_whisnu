<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/step/{parameter}', [StepController::class, 'index']);
Route::post('/step/1', [StepController::class, 'test1']);
Route::post('/step/2', [StepController::class, 'test2']);

Route::get('/test4/karyawan', [KaryawanController::class, 'index']);
Route::get('/test4/karyawan/create', [KaryawanController::class, 'create']);
Route::get('/test4/karyawan/detail/{id}', [KaryawanController::class, 'show']);
Route::get('/test4/karyawan/edit/{id}', [KaryawanController::class, 'edit']);

Route::get('api/test4/all_karyawan', [APIController::class, 'all_karyawan']);
Route::get('api/test4/find_karyawan/{id}', [APIController::class, 'find_karyawan']);
Route::post('api/test4/insert_karyawan', [APIController::class, 'store_karyawan']);
Route::post('api/test4/delete_karyawan', [APIController::class, 'delete_karyawan']);
Route::post('api/test4/karyawan/update_karyawan', [APIController::class, 'update_karyawan']);

Route::get('api/test4/all_jabatan', [APIController::class, 'all_jabatan']);
Route::get('api/test4/all_department', [APIController::class, 'all_department']);
