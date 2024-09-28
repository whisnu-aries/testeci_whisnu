<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class JabatanController extends Controller
{
  public function index()
  {
    return Inertia::render('Jabatan/List');
  }

  public function create()
  {
    return Inertia::render('Jabatan/Insert');
  }

  public function show(string $id)
  {
    return Inertia::render('Jabatan/Detail', [
      'id' => $id,
    ]);
  }

  public function edit(string $id)
  {
    return Inertia::render('Jabatan/Edit', [
      'id' => $id,
    ]);
  }
}
