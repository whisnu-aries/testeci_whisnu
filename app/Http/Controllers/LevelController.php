<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class LevelController extends Controller
{
  public function index()
  {
    return Inertia::render('Level/List');
  }

  public function create()
  {
    return Inertia::render('Level/Insert');
  }

  public function show(string $id)
  {
    return Inertia::render('Level/Detail', [
      'id' => $id,
    ]);
  }

  public function edit(string $id)
  {
    return Inertia::render('Level/Edit', [
      'id' => $id,
    ]);
  }
}
