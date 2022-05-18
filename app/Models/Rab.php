<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rab extends Model
{
    use HasFactory;
    protected $table = 'tb_rab';
     protected $fillable= [
         'id_rpk',
        'rincian_program',
        'nama_kegiatan',
        'kebutuhan_kegiatan',
        'kuantitas',
        'kuantitas_2',
        'durasi',
        'durasi_2',
        'kegiatan',
        'kegiatan_2',
        'merk',
        'type',
        'catalog',
        'proposal_project',
        'rab_detail',
        'perencanaan_gambar',
        'harga_satuan',
        'jumlah',
    ];
    public $timestamps = false;
}
