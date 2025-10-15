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
        $data = Dosen::create([
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'jurusan' => $request->jurusan,
        ]);

        MataKuliah::whereIn('id', $request->matakuliah)
            ->update(['dosen_pengampu' => $data->id]);

        if($data) {
            return redirect()->route('dosen.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('dosen.create-form')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    public function update(Request $request, $id) {
        $data = Dosen::findOrFail($id)->update([
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'jurusan' => $request->jurusan,
        ]);

        MataKuliah::where('dosen_pengampu', $id)->update(['dosen_pengampu' => null]);

        MataKuliah::whereIn('id', $request->matakuliah)
            ->update(['dosen_pengampu' => $id]);

        if($data) {
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
