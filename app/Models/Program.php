<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'tb_prog';

    protected $fillable= [
           'id',
           'kode_ik',
           'kode_prog',
           'program'
    ];

    /**
     * Get the ik that owns the Program
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ik()
    {
        return $this->belongsTo(Ik::class);
    }

    /**
     * Get all of the kegiatan for the Program
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'program_id');
    }
}
