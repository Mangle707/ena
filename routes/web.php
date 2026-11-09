<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\IdadeController;//import
use App\Http\Controllers\NotasController;//import
use App\Http\Controllers\NotasDController;//import

Route::get('/', function () {
    return view('portfolio');
});


//Rota GET
Route::get('/helpdesk', [HelpdeskController::class, 'index'])->name('helpdesk');
Route::get('/idade', [IdadeController::class, 'index'])->name('idade');
Route::post('/notas', [NotasController::class, 'index'])->name('notas');
// NOVA ROTA (POST)
Route::post('/idade', [IdadeController::class, 'calcular'])->name('idade.calcular');
Route::post('/helpdesk', [HelpdeskController::class, 'salvar'])->name('helpdesk.salvar');
Route::post('/notas', [NotasController::class, 'calcular'])->name('notas.calcular');

