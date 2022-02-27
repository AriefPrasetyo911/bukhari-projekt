<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TryOutDibeli extends Model
{
    use HasFactory;
    protected $table = 'try_out_dibeli';
    protected $fillable = [
        'id_paket',
        'id_user',
        'email_user',
        'nama_user',
        'jenis',
        'nama_paket',
        'deskripsi',
        'jumlah_soal',
        'harga_paket',
        'konfirmasi'
    ];
}
