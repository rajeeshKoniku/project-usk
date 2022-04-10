<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ik;

class Ss extends Model
{
    use HasFactory;
    protected $table = 'tb_ss';

    protected $fillable= [
           'id',
           'kode_ss',
           'sasaran',
    ];

    /**
     * Get all of the ik for the Ss
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ik()
    {
        return $this->hasMany(Ik::class, 'ss_id');
    }
}
