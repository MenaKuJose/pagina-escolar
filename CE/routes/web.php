<?php

use App\Http\Controllers\OfertaEducativaController;
use App\Http\Controllers\TablaUsuariosController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CrearOfertaComponente as LivewireCrearOfertaComponente;
use App\Livewire\OfAdminComponente as LivewireOfAdminComponente;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/usuarios', TablaUsuariosController::class);
    Route::resource('/oferta-educativa', OfertaEducativaController::class);

    // Rutas para los componentes Livewire
    Route::get('/crear-oferta', LivewireCrearOfertaComponente::class)->name('crear.oferta');
    Route::get('/ofertas-admin', LivewireOfAdminComponente::class)->name('ofertas.admin');
});
