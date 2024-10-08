<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class KaryawanController extends Controller
{
  public function index()
  {
    return Inertia::render('Karyawan/List');
  }

  public function create()
  {
    return Inertia::render('Karyawan/Insert');
  }

  public function show(string $id)
  {
    return Inertia::render('Karyawan/Detail', [
      'id' => $id,
    ]);
  }

  public function edit(string $id)
  {
    return Inertia::render('Karyawan/Edit', [
      'id' => $id,
    ]);
  }
}
