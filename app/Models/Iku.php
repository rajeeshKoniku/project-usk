<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ss;

class Iku extends Model
{
    use HasFactory;
     protected $table = 'tb_ik';
     protected $fillable= [
            "Kode_IK",
            "Indikator_Kinerja",
            "ss_id"
     ];

     /**
      * Get the ss that owns the Iku
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function ss()
     {
         return $this->belongsTo(Ss::class);
     }

     /**
      * Get all of the programs for the Iku
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function programs(): HasMany
     {
         return $this->hasMany(Program::class, 'ik_id');
     }
}
