<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuatriIn extends Model
{
    protected $table = 'cuatri_in';

    protected $fillable = [
        'oferta_educativa_id',
        'nombre',
        'materias',
    ];

    public function ofertaEducativa()
    {
        return $this->belongsTo(OfertaEducativa::class);
    }

    public function materias()
    {
        return $this->belongsToMany(Materias::class, 'cuatri_in_materia', 'cuatri_in_id', 'materia_id');
    }
}
