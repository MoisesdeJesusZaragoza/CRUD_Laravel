<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EmpleadosController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('empleados', EmpleadosController::class);

