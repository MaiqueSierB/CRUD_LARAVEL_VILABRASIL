<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\OrganizacaoController;

Route::get('/', function () {
    return redirect()->route('colaboradores.index');
});

Route::resource('colaboradores', ColaboradorController::class)
    ->parameters([
        'colaboradores' => 'colaborador',
    ])
    ->except('show');
    
Route::resource('organizacoes', OrganizacaoController::class)
    ->parameters([
        'organizacoes' => 'organizacao',
    ])
    ->except('show');
