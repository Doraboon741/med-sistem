<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\doctoresControlador;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function(){  
    return view('home');
});

Route::get('/medicos-pantalla', [doctoresControlador::class,'getDoctores'])
->name('medicos.get');

Route::post('/medicos-pantalla/create', [doctoresControlador::class,'createDoctores'])
->name('medicos.create');

Route::put('/medicos-pantalla/update/{id}', [doctoresControlador::class, 'updateDoctores'])
->name('medicos.update');

Route::delete('/medicos-pantalla/delete/{id}', [doctoresControlador::class, 'eliminateDoctores'])
->name('medicos.delete');

Route::get('/citas-pantalla',[CitaController::class, 'index'])
->name('citas.index');

Route::post('citas-pantalla',[CitaController::class, 'store'])
->name('citas.store');

Route::put('/citas-pantalla/{id}',[CitaController::class, 'update'])
->name('citas.update');

Route::delete('/citas-pantalla/{id}',[CitaController::class, 'destroy'])
->name('citas.destroy');
