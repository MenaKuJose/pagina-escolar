<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Servicios extends Model
{
    //
    use HasFactory;

    protected $table = 'Servicios';

    protected $fillable = [
        'nombre',
        'tipo_de_servicio',
        'contenido',
    ];

    
}

