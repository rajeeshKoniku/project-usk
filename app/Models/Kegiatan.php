<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
     protected $table = 'tb_keg';
     protected $fillable= [
            "Kd_Kegiatan",
            "Uraian_Kegiatan",
            "program_id"
     ];

     public function program()
     {
         return $this->belongsTo(Program::class);
     }
}
