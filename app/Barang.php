<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['kode_barang','nama_barang','deskripsi','stok_barang','harga_barang'];

}
