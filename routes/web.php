<?php

use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/step/{parameter}', [StepController::class, 'index']);
Route::post('/step/1', [StepController::class, 'test1']);
Route::post('/step/2', [StepController::class, 'test2']);
