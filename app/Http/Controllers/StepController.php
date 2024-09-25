<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StepController extends Controller
{
  public function index(int $step = 0)
  {
    return Inertia::render('Step', [
      'step' => $step
    ]);
  }
}
