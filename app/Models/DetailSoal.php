<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSoal extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'id_soal',
        'jenis_soal',
        'soal',
        'pilihan_a',
        'pilihan_b',
        'pilihan_c',
        'pilihan_d',
        'pilihan_e',
        'kunci_jawaban',
        'score_soal',
        'pembuat_soal_id',
        'pembuat_soal_username'
    ];
}
