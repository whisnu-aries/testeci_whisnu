<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StepController extends Controller
{
  public function index(int $step = 0)
  {
    if ($step >= 0 && $step <= 5) {
      return Inertia::render('Step' . $step);
    } else {
      return Inertia::render('Step0');
    }
  }

  private function renderStars(string $type, int $number)
  {
    switch ($type) {
      case 'Type 1':
        $array = range(1, $number);
        $stars = array_map(fn($n) => str_repeat('*', $n), $array);
        break;
      case 'Type 2':
        $array = range($number, 1);
        $stars = array_map(fn($n) => str_repeat('*', $n), $array);
        break;
      case 'Type 3':
        for ($i = 1; $i <= $number; $i++) {
          $text = '';
          for ($j = 1; $j <= $number - $i; $j++) {
            $text .= "&nbsp;";
          }
          for ($k = 1; $k <= $i; $k++) {
            $text .= "*";
          }
          $stars[] = $text;
        }
        break;
      default:
        $stars = [];
        break;
    }

    return $stars;
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

  private function renderFormattedNumber(int $number)
  {
    return number_format($number, 0, ',', '.');
  }

  private function renderTextNumber(int $number)
  {
    $words = [
      '',
      'satu',
      'dua',
      'tiga',
      'empat',
      'lima',
      'enam',
      'tujuh',
      'delapan',
      'sembilan',
      'sepuluh',
      'sebelas',
      'dua belas',
      'tiga belas',
      'empat belas',
      'lima belas',
      'enam belas',
      'tujuh belas',
      'delapan belas',
      'sembilan belas',
    ];

    $levels = [
      '',
      'ribu',
      'juta',
      'miliar',
      'triliun',
    ];

    $number = number_format($number, 0, ',', '.');
    $split = explode('.', $number);
    $words_return = [];

    $i_level = 0;
    for ($i = count($split) - 1; $i >= 0; $i--) {
      $hundreds = (int)($split[$i] / 100);
      $tens = (int)(($split[$i] % 100) / 10);
      $units = (int)($split[$i] % 10);

      $str = '';
      if ($hundreds == 1) {
        $str .= ' seratus';
      } elseif ($hundreds > 1) {
        $str .= $words[$hundreds] . ' ratus';
      }

      if ($tens >= 2) {
        $str .= ' ' . $words[$tens] . ' puluh';
      } elseif ($tens == 1) {
        $str .= ' ' . $words[$tens * 10 + $units];
        $units = 0;
      }

      if ($units > 0) {
        $str .= ' ' . $words[$units];
      }


      $str .= ' ' . $levels[$i_level] . ' ';
      array_unshift($words_return, $str);
      $i_level++;
    }

    return implode('', $words_return) . 'rupiah';
  }

  public function test2(Request $request)
  {
    $request->validate([
      'number' => ['required', 'numeric']
    ]);

    $number = $request->input('number');

    $response['formatted'] = 'Rp. ' . $this->renderFormattedNumber($number);
    $response['textCurrency'] = $this->renderTextNumber($number);

    return response()->json($response);
  }
}
