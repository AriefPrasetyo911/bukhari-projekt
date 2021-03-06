<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $dates = ['tanggal'];
    protected $fillable = 
    [
        'tanggal',
        'nama_jadwal',
        'jenis',
        'akses',
        'tampil',
        'harga'
    ];
}
