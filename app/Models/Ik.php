<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ss;

class Ik extends Model
{
    use HasFactory;
     protected $table = 'tb_ik';
     protected $fillable= [
            "id",
            "kode_ik",
            "indikator_kinerja",
            "ss_id"
     ];

     /**
      * Get the ss that owns the Ik
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function ss()
     {
         return $this->belongsTo(Ss::class);
     }

     /**
      * Get all of the programs for the Ik
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function programs()
     {
         return $this->hasMany(Program::class, 'ik_id');
     }
}
