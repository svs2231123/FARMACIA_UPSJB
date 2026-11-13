<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('template/administrador');
// });
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

// CRUD de categorías: crea 6 rutas (index, create, store, edit, update, destroy)
Route::resource('categories', CategoryController::class)->except('show');