<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imagenesController extends Controller
{
    public function index()
    {
        return view('images.index');
    }
}
