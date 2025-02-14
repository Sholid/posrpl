<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory;
        //protected $model = Pelanggan::class;
    protected $fillable = [
        'idbarang',
        'namabarang',
        'jumlah',
        'harga',
        'gambar',
       
    ];
}


