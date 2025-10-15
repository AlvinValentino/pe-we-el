<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'table_mahasiswa_mata_kuliah';

    protected $fillable = ['mahasiswa_id', 'matakuliah_id'];

    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id');
    }
}
