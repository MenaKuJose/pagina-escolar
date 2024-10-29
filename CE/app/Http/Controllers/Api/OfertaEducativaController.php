<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OfertaEducativa;
use Illuminate\Http\Request;

class OfertaEducativaController extends Controller
{
    public function index()
    {
        $oferta = OfertaEducativa::all();
        $data = [
            'ofertas' => $oferta,
            'datos' => 200
        ];

        // Retorna la respuesta en formato JSON
        return response()->json($data, $oferta);
    }
}
