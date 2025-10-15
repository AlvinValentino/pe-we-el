<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index() {
        $getMahasiswa = Mahasiswa::get();
        return view('mahasiswa.index', ['mahasiswas' => $getMahasiswa]);
    }

    public function create() {
        return view('mahasiswa.create', ['type' => 'Create']);
    }

    public function edit($id) {
        $data = Mahasiswa::findOrFail($id);
        return view('mahasiswa.create', ['type' => 'Edit', 'data' => $data]);
    }

    public function store(Request $request) {
        $data = Mahasiswa::create([
            'name' => $request->name,
            'NIM' => $request->NIM,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan
        ]);

        if($data) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('mahasiswa.create-form')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    public function update(Request $request, $id) {
        $data = Mahasiswa::findOrFail($id)->update([
            'name' => $request->name,
            'NIM' => $request->NIM,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan
        ]);

        if($data) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('mahasiswa.update-form', ['id' => $id])->with('error', 'Data Gagal Diupdate');
        }
    }

    public function destroy($id) {
        $data = Mahasiswa::where('id', $id)->delete();

        if($data) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('mahasiswa.index')->with('error', 'Data Gagal Dihapus');
        }
    }
}
