<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailtransaksi extends Model
{
    /** @use HasFactory<\Database\Factories\DetailtransaksiFactory> */
    use HasFactory;
    protected $fillable = [
        'notrans',
        'idbarang',
        'harga',
        'jumlah',
    ];

    protected $primaryKey = 'iddetail';
}
