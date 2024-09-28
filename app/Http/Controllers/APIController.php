<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    $karyawan = Karyawan::with(['jabatan', 'department'])->findOrFail($request->id_karyawan);
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

    $response['success'] = isset($karyawan);
    $response['message'] = "Success delete karyawan";
    return response()->json($response);
  }

  public function all_jabatan()
  {
    $jabatan = Jabatan::all();
    return response()->json($jabatan);
  }

  public function all_department()
  {
    $department = Department::all();
    return response()->json($department);
  }
}
