<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'jenis',
        'kkm',
        'waktu',
        'tampil'
    ];

    public function pertanyaans(){
        return $this->hasMany(pertanyaan::class);
    }
}
