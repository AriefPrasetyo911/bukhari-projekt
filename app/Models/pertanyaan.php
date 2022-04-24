<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'pertanyaans';

    //satu paket bisa memiliki banyak pertanyaan
    public function soal(){
        return $this->belongsTo(soal::class);
    }

    //untuk pilihan jawaban
    public function pilihanPertanyaan(){
        return $this->hasMany(pilihan_pertanyaan::class);
    }

    public function jawabanBenar(){
        return $this->hasOne(JawabanPertanyaan::class);
    }

    // public function jawaban(){
    //     return $this->hasOne(pilihan_pertanyaan::class);
    // }

    // public function jawabanBenar(){
    //     return $this->hasOne(pilihan_pertanyaan::class)->where('benar',1)->first();
    // }
}
