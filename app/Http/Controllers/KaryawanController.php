<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
