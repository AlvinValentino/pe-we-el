<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\Dosen;

class MataKuliahController extends Controller
{
    public function index() {
        $getMataKuliah = MataKuliah::with('dosen')->get();
        return view('mata_kuliah.index', ['matakuliahs' => $getMataKuliah]);
    }

    public function create() {
        $getDosen = Dosen::get();
        return view('mata_kuliah.create', ['type' => 'Create', 'dosens' => $getDosen]);
    }

    public function edit($id) {
        $data = MataKuliah::findOrFail($id);
        $getDosen = Dosen::get();
        return view('mata_kuliah.create', ['type' => 'Edit', 'data' => $data, 'dosens' => $getDosen]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'kode_mk' => ['required', 'string', 'max:10', 'unique:mata_kuliah,kode_mk'],
            'nama_mk' => ['required', 'string', 'max:100'],
            'jurusan' => ['required', 'string', 'max:100'],
            'sks' => ['required', 'integer', 'min:1', 'max:6'],
            'dosen_pengampu' => ['required', 'exists:dosen,id'],
        ]);

        $data = MataKuliah::create($validated);

        if ($data) {
            return redirect()->route('matakuliah.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('matakuliah.create-form')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'kode_mk' => ['required', 'string', 'max:10', 'unique:mata_kuliah,kode_mk,' . $id],
            'nama_mk' => ['required', 'string', 'max:100'],
            'jurusan' => ['required', 'string', 'max:100'],
            'sks' => ['required', 'integer', 'min:1', 'max:6'],
            'dosen_pengampu' => ['required', 'exists:dosen,id'],
        ]);

        $data = MataKuliah::findOrFail($id)->update($validated);

        if ($data) {
            return redirect()->route('matakuliah.index')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('matakuliah.update-form', ['id' => $id])->with('error', 'Data Gagal Diupdate');
        }
    }

    public function destroy($id) {
        $data = MataKuliah::findOrFail($id)->delete();

        if($data) {
            return redirect()->route('matakuliah.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('matakuliah.index')->with('error', 'Data Gagal Dihapus');
        }
    }
}
