<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class KrsController extends Controller
{
    public function index() {
        $getKrs = Krs::with(['mahasiswa', 'mata_kuliah'])->get();
        return view('krs.index', ['krs' => $getKrs]);
    }

    public function create() {
        $getMahasiswa = Mahasiswa::get();
        $getMataKuliah = MataKuliah::get();
        return view('krs.create', ['type' => 'Create', 'mahasiswas' => $getMahasiswa, 'matakuliahs' => $getMataKuliah]);
    }

    public function getMataKuliahByMahasiswa($mahasiswa_id){
        $cekKRS = Krs::with('mata_kuliah')->where('mahasiswa_id', $mahasiswa_id)->get();
        $totalSKS = $cekKRS->sum('mata_kuliah.sks');
        
        $getMataKuliah = MataKuliah::where('jurusan', 'Sistem dan Teknologi Informasi')->where('sks', '<=', (24 - $totalSKS))->get();

        dd($totalSKS, $getMataKuliah);

        // Atau jika semua mata kuliah tersedia:
        // $matakuliahs = MataKuliah::select('id', 'kode_mk', 'nama_mk')->get();

        return response()->json($matakuliahs);
    }
}
