<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'id_soal',
        'id_paket',
        'id_user',
        'nama',
        'pilihan',
        'isi_pilihan',
        'kunci_jawaban',
        'isi_kunci_jawaban',
        'hasil'
    ];
}
