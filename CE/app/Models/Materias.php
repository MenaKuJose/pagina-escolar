<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    protected $table = 'materias';

    protected $fillable = [
        'nombre',
    ];

    public function cuatriIns()
    {
        return $this->belongsToMany(CuatriIn::class, 'cuatri_in_materia', 'materia_id', 'cuatri_in_id');
    }

    public function cuatriCons()
    {
        return $this->belongsToMany(CuatriCon::class, 'cuatri_con_materia', 'materia_id', 'cuatri_con_id');
    }
}
