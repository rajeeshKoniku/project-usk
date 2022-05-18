<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KKmentri extends Model
{
    use HasFactory;
    protected $table = 'tb_kk';

    protected $fillable= [
           'kode_ik',
           'pk_menteri',
           'bobot',
    ];
}
