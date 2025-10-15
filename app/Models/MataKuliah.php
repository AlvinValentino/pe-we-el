<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'table_matakuliah';

    protected $fillable = ['kode_mk', 'nama_mk', 'jurusan', 'sks', 'dosen_pengampu'];

    public $timestamps = false;

    public function dosen() {
        return $this->belongsTo(Dosen::class, 'dosen_pengampu');
    }

    public function krs() {
        return $this->hasMany(Krs::class, 'mata_kuliah_id');
    }
}
