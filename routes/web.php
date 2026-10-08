<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::resource('doctors', DoctorController::class);
Route::resource('appointments', AppointmentController::class);
