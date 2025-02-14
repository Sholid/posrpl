<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    /** @use HasFactory<\Database\Factories\TransaksiFactory> */
    use HasFactory;
    protected $fillable = [
        'notrans',
        'idpetugas',
        'tglbeli',
        'total',
        'bayar',
        'kembali',
    ];

    protected $primaryKey = 'notrans';
}
