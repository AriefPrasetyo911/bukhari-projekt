<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TryOut extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'id_soal',
        'id_user',
        'nama',
        'pilihan',
        'score',
        'status'
    ];
}
