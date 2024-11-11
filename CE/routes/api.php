<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/saludo', function () {
    return 'Hola esto es una api';
});

Route::get('/list-of', [App\Livewire\OfAdminComponente::class, 'index'])->name('of-admin-componente');
Route::get('/list-Sevicio', [App\Livewire\ServiciosComponent::class, 'index'])->name('servicios-component');
Route::get('/add-of', [App\Livewire\OfAdminComponente::class, 'add'])->name('of-admin-componente');

Route::get('/list-users', [App\Livewire\TablaUsersComponent::class, 'index'])->name('tabla-users-component.blade');
