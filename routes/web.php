<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepairTicketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/repair/create', [RepairTicketController::class, 'create'])->name('repair.create');
Route::post('/repair', [RepairTicketController::class, 'store'])->name('repair.store');
Route::get('/repair', [RepairTicketController::class, 'index'])->name('repair.index');
Route::delete('/repair/{id}', [RepairTicketController::class, 'destroy'])->name('repair.destroy');
Route::get('/repair/{id}/edit', [RepairTicketController::class, 'edit'])->name('repair.edit');
Route::put('/repair/{id}', [RepairTicketController::class, 'update'])->name('repair.update');