<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablaUsuariosController extends Controller
{
    public function index()
    {
        return view('Usuarios.index');
    }
}
