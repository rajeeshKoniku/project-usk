<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'tb_user';
    protected $fillable = [
        'unit_kerja',
        'nama_pengguna',
        'level_pengguna',
    ];
    public $timestamps = false;
}
