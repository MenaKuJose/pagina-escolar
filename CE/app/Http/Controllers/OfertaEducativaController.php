<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfertaEducativaController extends Controller
{
    public function index()
    {
        return view('oferta-educativa.index');
    }
}
