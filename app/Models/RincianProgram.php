<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianProgram extends Model
{
    use HasFactory;
    protected $table = 'tb_rincian_program';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable =
    [
        "Keg",
        "KRO",
        "RO",
        "KP",
        "SK",
        "MAK",
        "CODEBASE",
    ];
}
