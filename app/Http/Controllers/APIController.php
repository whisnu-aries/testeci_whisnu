<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Department;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Level;

class APIController extends Controller
{
  public function all_karyawan()
  {
    $karyawan = Karyawan::with(['jabatan', 'department'])->get();
    return response()->json($karyawan);
  }

  public function find_karyawan(string $id)
  {
    $karyawan = Karyawan::with(['jabatan', 'department'])->findOrFail($id);

    return response()->json($karyawan);
  }

  public function store_karyawan(Request $request)
  {
    $request->validate([
      'nik' => ['required', 'unique:karyawan,nik'],
      'nama' => ['required', 'string'],
      'ttl' => ['required', 'date'],
      'alamat' => ['required', 'string'],
      'id_jabatan' => ['required', 'integer'],
      'id_department' => ['required', 'integer'],
    ]);

    $karyawan = new Karyawan;
    $karyawan->nik = $request->input('nik');
    $karyawan->nama = $request->input('nama');
    $karyawan->ttl = $request->input('ttl');
    $karyawan->alamat = $request->input('alamat');
    $karyawan->id_jabatan = $request->input('id_jabatan');
    $karyawan->id_department = $request->input('id_department');

    $success = $karyawan->save();

    $response['success'] = $success;
    $response['message'] = $success  ? "Success insert karyawan" : "failed insert karyawan";
    return response()->json($response);
  }

  public function update_karyawan(Request $request)
  {
    $request->validate([
      'id_karyawan' => ['required', 'integer'],
      'nik' => ['required', 'string', Rule::unique('karyawan')->ignore($request->nik, 'nik')],
      'nama' => ['required', 'string'],
      'ttl' => ['required', 'date'],
      'alamat' => ['required', 'string'],
      'id_jabatan' => ['required', 'integer'],
      'id_department' => ['required', 'integer'],
    ]);

    $karyawan = Karyawan::findOrFail($request->id_karyawan);
    $karyawan->nik = $request->input('nik');
    $karyawan->nama = $request->input('nama');
    $karyawan->ttl = $request->input('ttl');
    $karyawan->alamat = $request->input('alamat');
    $karyawan->id_jabatan = $request->input('id_jabatan');
    $karyawan->id_department = $request->input('id_department');
    $success = $karyawan->save();

    $response['success'] = $success;
    $response['message'] = $success  ? "Success insert karyawan" : "failed insert karyawan";
    return response()->json($response);
  }

  public function delete_karyawan(Request $request)
  {
    $karyawan = Karyawan::findOrFail($request->id);

    $response['success'] = $karyawan->delete();
    $response['message'] = "Success delete karyawan";
    return response()->json($response);
  }

  public function all_jabatan()
  {
    $jabatan = Jabatan::with('level')->get();
    return response()->json($jabatan);
  }

  public function find_jabatan(string $id)
  {
    $jabatan = Jabatan::with('level')->findOrFail($id);

    return response()->json($jabatan);
  }

  public function store_jabatan(Request $request)
  {
    $request->validate([
      'nama_jabatan' => ['required', 'string'],
      'id_level' => ['required', 'integer'],
    ]);

    $jabatan = new Jabatan();
    $jabatan->nama_jabatan = $request->input('nama_jabatan');
    $jabatan->id_level = $request->input('id_level');

    $success = $jabatan->save();

    $response['success'] = $success;
    $response['message'] = $success  ? "Success insert jabatan" : "failed insert jabatan";
    return response()->json($response);
  }

  public function update_jabatan(Request $request)
  {
    $request->validate([
      'id_jabatan' => ['required', 'integer'],
      'nama_jabatan' => ['required', 'string'],
      'id_level' => ['required', 'integer'],
    ]);

    $jabatan = Jabatan::findOrFail($request->id_jabatan);
    $jabatan->nama_jabatan = $request->input('nama_jabatan');
    $jabatan->id_level = $request->input('id_level');

    $success = $jabatan->save();

    $response['success'] = $success;
    $response['message'] = $success  ? "Success update jabatan" : "failed update jabatan";
    return response()->json($response);
  }

  public function delete_jabatan(Request $request)
  {
    $jabatan = Jabatan::findOrFail($request->id);

    $response['success'] = $jabatan->delete();
    $response['message'] = "Success delete jabatan";
    return response()->json($response);
  }

  public function all_level()
  {
    $level = Level::all();
    return response()->json($level);
  }

  public function find_level(string $id)
  {
    $level = Level::findOrFail($id);

    return response()->json($level);
  }

  public function store_level(Request $request)
  {
    $request->validate([
      'nama_level' => ['required', 'string'],
    ]);

    $level = new Level();
    $level->nama_level = $request->input('nama_level');
    $success = $level->save();

    $response['success'] = $success;
    $response['message'] = $success  ? "Success insert level" : "failed insert level";
    return response()->json($response);
  }

  public function update_level(Request $request)
  {
    $request->validate([
      'id_level' => ['required', 'integer'],
      'nama_level' => ['required', 'string'],
    ]);

    $level = Level::findOrFail($request->id_level);
    $level->nama_level = $request->input('nama_level');
    $success = $level->save();

    $response['success'] = $success;
    $response['message'] = $success  ? "Success update level" : "failed update level";
    return response()->json($response);
  }

  public function delete_level(Request $request)
  {
    $level = Level::findOrFail($request->id);

    $response['success'] = $level->delete();
    $response['message'] = "Success delete level";
    return response()->json($response);
  }

  public function all_department()
  {
    $department = Department::all();
    return response()->json($department);
  }

  public function find_department(string $id)
  {
    $department = Department::findOrFail($id);

    return response()->json($department);
  }

  public function store_department(Request $request)
  {
    $request->validate([
      'nama_dept' => ['required', 'string'],
    ]);

    $dept = new Department();
    $dept->nama_dept = $request->input('nama_dept');
    $success = $dept->save();

    $response['success'] = $success;
    $response['message'] = $success  ? "Success insert department" : "failed insert department";
    return response()->json($response);
  }


  public function update_department(Request $request)
  {
    $request->validate([
      'nama_dept' => ['required', 'string'],
    ]);

    $dept = Department::findOrFail($request->id_department);
    $dept->nama_dept = $request->input('nama_dept');
    $success = $dept->save();

    $response['success'] = $success;
    $response['message'] = $success  ? "Success update department" : "failed update department";
    return response()->json($response);
  }

  public function delete_department(Request $request)
  {
    $department = Department::findOrFail($request->id);

    $response['success'] = $department->delete();
    $response['message'] = "Success delete department";
    return response()->json($response);
  }
}
