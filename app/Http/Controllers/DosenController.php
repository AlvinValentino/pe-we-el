<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\MataKuliah;

class DosenController extends Controller
{
    public function index() {
        $getDosen = Dosen::get();
        return view('dosen.index', ['dosens' => $getDosen]);
    }

    public function create() {
        $getMataKuliah = MataKuliah::get();
        return view('dosen.create', ['type' => 'Create', 'matakuliahs' => $getMataKuliah]);
    }

    public function edit($id) {
        $data = Dosen::findOrFail($id);
        $getMataKuliah = MataKuliah::get();
        return view('dosen.create', ['type' => 'Edit', 'data' => $data, 'matakuliahs' => $getMataKuliah]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nip' => ['required', 'string', 'max:30', 'unique:dosen,nip'],
            'nama_dosen' => ['required', 'string', 'max:100'],
            'pendidikan_terakhir' => ['required', 'string', 'max:50'],
            'jurusan' => ['required', 'string', 'max:100'],
        ]);

        $data = Dosen::create([
            'nip' => $validated['nip'],
            'nama_dosen' => $validated['nama_dosen'],
            'pendidikan_terakhir' => $validated['pendidikan_terakhir'],
            'jurusan' => $validated['jurusan'],
        ]);

        if ($data) {
            return redirect()->route('dosen.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('dosen.create-form')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'nip' => ['required', 'string', 'max:30', 'unique:dosen,nip,' . $id],
            'nama_dosen' => ['required', 'string', 'max:100'],
            'pendidikan_terakhir' => ['required', 'string', 'max:50'],
            'jurusan' => ['required', 'string', 'max:100'],
        ]);

        $data = Dosen::findOrFail($id)->update([
            'nip' => $validated['nip'],
            'nama_dosen' => $validated['nama_dosen'],
            'pendidikan_terakhir' => $validated['pendidikan_terakhir'],
            'jurusan' => $validated['jurusan'],
        ]);

        if ($data) {
            return redirect()->route('dosen.index')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('dosen.update-form', ['id' => $id])->with('error', 'Data Gagal Diupdate');
        }
    }


    public function destroy($id) {
        $data = Dosen::where('id', $id)->delete();

        if($data) {
            return redirect()->route('dosen.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('dosen.index')->with('error', 'Data Gagal Dihapus');
        }
    }
}
