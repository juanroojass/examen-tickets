<?php

use Illuminate\Support\Facades\Route;

Route::get('/tickets', [App\Http\Controllers\TicketsController::class, 'tickets'])->name('tickets');
Route::post('/guardar-ticket', [App\Http\Controllers\TicketsController::class, 'guardar_ticket'])->name('guardar.ticket');
Route::get('/seguimiento-tickets', [App\Http\Controllers\TicketsController::class, 'seguimiento_tickets'])->name('seguimiento.tickets')->middleware('permiso.usuario.tester');
Route::get('/descarga-evidencia/{url}', [App\Http\Controllers\TicketsController::class, 'descarga_evidencia'])->name('descarga.evidencia');
