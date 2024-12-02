<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $table = 'servicios';  // Asegúrate de que el nombre de la tabla esté en minúsculas, ya que por convención Laravel usa nombres en plural y en minúsculas.

    protected $fillable = [
        'nombre',
        'tipo_de_servicio',
        'contenido',
        'imagen', // Agregado el campo imagen
    ];
}
