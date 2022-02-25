<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perkin extends Model
{
    use HasFactory;
    protected $table = 'tbl_perjanjian_kinerja';
    protected $fillable = [
           "Sasaran",
           "Kode_IK",
           "Indikator_Kinerja",
           "Satuan",
           "Pk_Menteri",
           "tw_1",
           "tw_2",
           "tw_3",
           "tw_4",
           "Bobot"
    ];
    public $timestamps = false;

}
