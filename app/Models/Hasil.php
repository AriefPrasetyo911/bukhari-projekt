<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $table = 'hasils';
    
    public function soal(){
        return $this->belongsTo('App\Models\soal');
    }

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function jawaban(){
        return $this->hasMany('App\Models\Jawaban', 'id_jawaban', 'id');
    }
}
