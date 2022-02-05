<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembahasan extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'id_soal',
        'id_paket',
        'jenis_soal',
        'pembahasan',
    ];
}
