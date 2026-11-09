<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\IdadeController;//import
use App\Http\Controllers\NotasController;//import
use App\Http\Controllers\NotasDController;//import
use App\Http\Controllers\LoginController;//import
use App\Http\Controllers\JogosController;//import

Route::get('/', function () {
    return view('portfolio');
});


//Rota GET
Route::get('/helpdesk', [HelpdeskController::class, 'index'])->name('helpdesk');
Route::get('/idade', [IdadeController::class, 'index'])->name('idade');
Route::get('/notas', [NotasController::class, 'index'])->name('notas');
Route::get('/notasD', [NotasDController::class, 'index'])->name('notasD');// com erro
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/jogos', [JogosController::class, 'index'])->name('jogos');
// NOVA ROTA (POST)
Route::post('/idade', [IdadeController::class, 'calcular'])->name('idade.calcular');
Route::post('/helpdesk', [HelpdeskController::class, 'salvar'])->name('helpdesk.salvar');
Route::post('/notas', [NotasController::class, 'calcular'])->name('notas.calcular');
Route::post('/notasD', [NotasDController::class, 'calcular'])->name('notasD.calcular');//com erro
Route::post('/login', [LoginController::class, 'salvar'])->name('login.salvar');
Route::post('/jogos', [JogosController::class, 'salvar'])->name('jogos.salvar');

