<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class StepController extends Controller
{
  public function index(int $step = 0)
  {
    switch ($step) {
      case '0':
        return Inertia::render('Step0', [
          'step' => $step
        ]);
        break;
      case '1':
        return Inertia::render('Step1', [
          'step' => $step
        ]);
        break;
      case '2':
        return Inertia::render('Step2', [
          'step' => $step
        ]);
        break;
      case '3':
        return Inertia::render('Step3', [
          'step' => $step
        ]);
        break;
      case '4':
        return Inertia::render('Step4', [
          'step' => $step
        ]);
        break;
      case '5':
        return Inertia::render('Step5', [
          'step' => $step
        ]);
        break;
      default:
        abort(Response::HTTP_NOT_FOUND);
        break;
    }
  }
}
