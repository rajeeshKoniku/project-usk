<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikk extends Model
{
    use HasFactory;
    protected $table = 'tb_ikk';
    protected $fillable= [
            "kode_ik",
            "kode_prog"
     ];
}
