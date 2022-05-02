<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rangka extends Model
{
    use HasFactory;
    protected $table = 'tb_rangka';
    protected $fillable =
    [
        'codebase',
        'kode_prog',
        'rincian_program',
        'nama_kegiatan',
        'kebutuhan_kegiatan',
        'akun',
        'jenis_belanja',
        'PNBP_unitkerja',
        'PNBP_institusi',
        'BOPTN',
        'kerjasama',
        'hibah',
        'biaya_kegiatan',
    ];
    public $timestamps = false;
}
