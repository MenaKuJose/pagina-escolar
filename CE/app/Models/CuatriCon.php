<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuatriCon extends Model
{
    protected $table = 'cuatri_con';

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
        return $this->belongsToMany(Materias::class, 'cuatri_con_materia', 'cuatri_con_id', 'materia_id');
    }
}
