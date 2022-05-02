<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;
    protected $table = 'tb_kk';
    protected $fillable= [
           'satuan',
           'tw_1',
           'tw_2',
           'tw_3',
           'tw_4',
           'nip',
           'nama_pimpinan',
           'verifikasi'
    ];

    const DISETUJUI = 1;
    const DITOLAK = 2;
}
