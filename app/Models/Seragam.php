<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seragam extends Model
{
    use HasFactory;

    protected $table = 'seragam';

    protected $fillable = [
        'harga',
        'nama_barang',
        'ukuran'
    ];
}
