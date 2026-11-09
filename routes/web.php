<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HelpdeskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helpdesk', [HelpdeskController::class, 'index'])->name('helpdesk');
Route::get('/helpdesk', [HelpdeskController::class, 'salvar'])->name('helpdesk.salvar');
