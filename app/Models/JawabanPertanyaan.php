<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPertanyaan extends Model
{
    use HasFactory;
    protected $table = 'jawaban_pertanyaans';

    public function pertanyaan(){
        return $this->belongsTo(pertanyaan::class);
    }
}
