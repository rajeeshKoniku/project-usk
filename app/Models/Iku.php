<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iku extends Model
{
    use HasFactory;
     protected $table = 'tbl_ik';
     protected $fillable = [
            "index_indikator",
            "indikator_kinerja"
     ];
     public $timestamps = false;
}
