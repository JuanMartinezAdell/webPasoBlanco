<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgendaController;


Route::get('/', function () {
    return Inertia::render('AdminDashboard');
})->name('admin.admindashboard');


Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
