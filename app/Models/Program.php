<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'tb_prog';
    protected $fillable= [
           'Kd_Program',
           'Program'
    ];
}
