<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesifikasi extends Model
{
    use HasFactory;
    protected $table = 'tb_spesifikasi';
    protected $fillable =
    [
        "akun"
        "kebutuhan_kegiatan"
        "jenis_kegiatan"
        "merk"
        "type"
        "catalog"
        "kuantitas"
        "durasi"
        "kegiatan"
        "harga_Satuan"
    ];
}
