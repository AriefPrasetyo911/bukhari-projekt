<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skorPilihanTKP extends Model
{
    use HasFactory;
    protected $table = 'skor_pilihan_TKPs';
    protected $fillable = [
        'id_soal',
        'id_paket',
        'skor_pilihan_a',
        'skor_pilihan_b',
        'skor_pilihan_c',
        'skor_pilihan_d',
        'skor_pilihan_e'
    ];
}
