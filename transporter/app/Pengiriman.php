<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengiriman extends Model
{


    protected $fillable = [
    'no_pengiriman',
    'tanggal',
    'lokasi_id',
    'barang_id',
    'jumlah_barang',
    'harga_barang',
    'kurir_id',
];
}
