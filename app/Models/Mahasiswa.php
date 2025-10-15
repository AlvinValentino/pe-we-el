<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'table_mahasiswa';

    protected $fillable = ['NIM', 'name', 'tempat_lahir', 'tanggal_lahir', 'jurusan', 'angkatan'];

    public $timestamps = false;
}
