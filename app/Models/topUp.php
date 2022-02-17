<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topUp extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_email',
        'transfer_ke',
        'rek_atas_nama',
        'nominal',
        'bukti_transfer',
        'status'
    ];
}
