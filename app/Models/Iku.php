<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iku extends Model
{
    use HasFactory;
     protected $table = 'tb_ik';
     protected $fillable= [
            "Kode_IK",
            "Indikator_Kinerja"
     ];
}
