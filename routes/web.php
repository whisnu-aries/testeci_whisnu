<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('step/0');
});

Route::get('/step/{parameter}', [StepController::class, 'index']);
Route::post('/step/1', [StepController::class, 'test1']);
Route::post('/step/2', [StepController::class, 'test2']);

Route::get('/test3/download', function () {
    $file = public_path('test_3.sql');

    return response()->download($file);
});
Route::get('/test3/run', function () {
    $sql = file_get_contents(public_path('test_3.sql'));
    $statements = explode(';', $sql);

    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (!empty($statement)) {
            DB::statement($statement);
        }
    }
});

Route::get('/test4/karyawan', [KaryawanController::class, 'index']);
Route::get('/test4/karyawan/create', [KaryawanController::class, 'create']);
Route::get('/test4/karyawan/detail/{id}', [KaryawanController::class, 'show']);
Route::get('/test4/karyawan/edit/{id}', [KaryawanController::class, 'edit']);

Route::get('/test4/jabatan', [JabatanController::class, 'index']);
Route::get('/test4/jabatan/create', [JabatanController::class, 'create']);
Route::get('/test4/jabatan/detail/{id}', [JabatanController::class, 'show']);
Route::get('/test4/jabatan/edit/{id}', [JabatanController::class, 'edit']);

Route::get('/test4/level', [LevelController::class, 'index']);
Route::get('/test4/level/create', [LevelController::class, 'create']);
Route::get('/test4/level/detail/{id}', [LevelController::class, 'show']);
Route::get('/test4/level/edit/{id}', [LevelController::class, 'edit']);

Route::get('/test4/department', [DepartmentController::class, 'index']);
Route::get('/test4/department/create', [DepartmentController::class, 'create']);
Route::get('/test4/department/detail/{id}', [DepartmentController::class, 'show']);
Route::get('/test4/department/edit/{id}', [DepartmentController::class, 'edit']);

Route::get('api/test4/all_karyawan', [APIController::class, 'all_karyawan']);
Route::get('api/test4/find_karyawan/{id}', [APIController::class, 'find_karyawan']);
Route::post('api/test4/insert_karyawan', [APIController::class, 'store_karyawan']);
Route::post('api/test4/update_karyawan', [APIController::class, 'update_karyawan']);
Route::post('api/test4/delete_karyawan', [APIController::class, 'delete_karyawan']);

Route::get('api/test4/all_jabatan', [APIController::class, 'all_jabatan']);
Route::get('api/test4/find_jabatan/{id}', [APIController::class, 'find_jabatan']);
Route::post('api/test4/insert_jabatan', [APIController::class, 'store_jabatan']);
Route::post('api/test4/update_jabatan', [APIController::class, 'update_jabatan']);
Route::post('api/test4/delete_jabatan', [APIController::class, 'delete_jabatan']);


Route::get('api/test4/all_level', [APIController::class, 'all_level']);
Route::get('api/test4/find_level/{id}', [APIController::class, 'find_level']);
Route::post('api/test4/insert_level', [APIController::class, 'store_level']);
Route::post('api/test4/update_level', [APIController::class, 'update_level']);
Route::post('api/test4/delete_level', [APIController::class, 'delete_level']);

Route::get('api/test4/all_department', [APIController::class, 'all_department']);
Route::get('api/test4/find_department/{id}', [APIController::class, 'find_department']);
Route::post('api/test4/insert_department', [APIController::class, 'store_department']);
Route::post('api/test4/update_department', [APIController::class, 'update_department']);
Route::post('api/test4/delete_department', [APIController::class, 'delete_department']);
