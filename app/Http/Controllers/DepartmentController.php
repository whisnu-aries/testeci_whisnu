<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DepartmentController extends Controller
{
  public function index()
  {
    return Inertia::render('Department/List');
  }

  public function create()
  {
    return Inertia::render('Department/Insert');
  }

  public function show(string $id)
  {
    return Inertia::render('Department/Detail', [
      'id' => $id,
    ]);
  }

  public function edit(string $id)
  {
    return Inertia::render('Department/Edit', [
      'id' => $id,
    ]);
  }
}
