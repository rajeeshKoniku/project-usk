<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianProgram extends Model
{
    use HasFactory;
    protected $table = 'tb_rancangan_anggaran';
    protected $fillable =
    [
        "codebase",
        "Rip",
        "Keg",
        "KRO",
        "RO",
        "KP",
        "SK",
        "MAK",
    ];
    public $timestamps = false;
}
