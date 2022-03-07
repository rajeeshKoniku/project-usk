<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    use HasFactory;
    protected $table = "tb_komponen";
    protected $fillable =
    [
        "kebutuhan_kegiatan",
        "rincian_komponen",
        "akun",
        "jenis_belanja",
    ];
}
