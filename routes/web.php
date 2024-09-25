<?php

use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/step/{parameter}', [StepController::class, 'index']);



// Route::get('/', Inertia::render('Welcome'));
