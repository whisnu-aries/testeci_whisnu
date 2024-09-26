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
      case '1':
      case '2':
      case '3':
      case '4':
      case '5':
        return Inertia::render('Step' . $step);
        break;
      default:
        abort(Response::HTTP_NOT_FOUND);
    }
  }

  private function renderStars(string $type, int $number)
  {
    switch ($type) {
      case 'Type 1':
        $stars = range(1, $number);
        break;
      case 'Type 2':
        $stars = range($number, 1);
        break;
      default:
        $stars = [];
        break;
    }

    return array_map(fn($n) => str_repeat('*', $n), $stars);
  }

  public function test1(Request $request)
  {
    $request->validate([
      'type' => ['required'],
      'number' => ['nullable', 'numeric']
    ]);

    $type = $request->type;
    $number = $request->input('number');

    $stars = $this->renderStars($type, $number);

    return Inertia::render('Step1', [
      'type' => $type,
      'output' => $stars
    ]);
  }
}
