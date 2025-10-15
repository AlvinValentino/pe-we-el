<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'table_dosen';
    protected $fillable = ['nip', 'nama_dosen', 'pendidikan_terakhir', 'jurusan'];

    public $timestamps = false;

    public function mata_kuliah()
    {
        return $this->hasMany(MataKuliah::class, 'dosen_pengampu');
    }
}
