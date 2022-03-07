<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanRinci extends Model
{
    use HasFactory;
    protected $table = 'tb_kegiatan_rinci';

    protected $fillable= [
           'kode_keg',
           'Uraian_Kegiatan',
           'Rencana_Jadwal_Pelaksanaan',
           'Kebutuhan_Kegiatan',

    ];

}
