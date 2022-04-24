<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilihan_pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pilihan_pertanyaans';

    //satu pertanyaan bisa memiliki banyak pilihan jawaban
    public function pertanyaan(){
        return $this->belongsTo(pertanyaan::class);
    }
}
