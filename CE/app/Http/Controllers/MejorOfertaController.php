<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MejorOfertaController extends Controller
{
    public function index()
    {
        return view('oferta-educativa.mejor-oferta.index');
    }
}
