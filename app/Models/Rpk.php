<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rpk extends Model
{
    use HasFactory;
    protected $table = 'tb_rpk';
    protected $fillable =
    [
        "kode_ik",
        "kode_program",
        "rincian_program",
        "nama_kegiatan",
        "Proposal_Project",
        "Kebutuhan_Kegiatan",
        "Rencana_Jadwal_Pelaksanaan",
        "tahun",
    ];
}
