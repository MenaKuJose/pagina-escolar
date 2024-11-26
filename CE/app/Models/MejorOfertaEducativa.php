<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MejorOfertaEducativa extends Model
{
    use HasFactory;

    protected $table = 'mejor_oferta_educativa';

    protected $fillable = [
        'oferta_educativa_id',
        'etapa_inicial',
        'etapa_continuidad',
    ];
    // Relación con la tabla OfertaEducativa
    public function ofertaEducativa()
    {
        return $this->belongsTo(OfertaEducativa::class);
    }
}
