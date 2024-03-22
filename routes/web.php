<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroWebController;
use App\Http\Controllers\AutorController;

Route::get('/autores', [AutorController::class, 'index']);
Route::get('/autores/{id}/edit', [AutorController::class, 'edit']);
Route::put('/autores/{id}', [AutorController::class, 'update']);
Route::delete('/autores/{id}', [AutorController::class, 'destroy']);

Route::get('/api/libros/filtrar-por-genero/{genero}', [LibroWebController::class, 'ApifiltrarPorGenero']);
Route::get('/api/libros/filtrar-por-fecha/{fecha}', [LibroWebController::class, 'ApifiltrarPorFecha']);

Route::get('/libros', [LibroWebController::class, 'index']);
Route::get('libros/Organize', [LibroWebController::class, 'Organize']);
Route::get('/ultima-actualizacion', [LibroWebController::class, 'obtenerUltimaActualizacion']);
Route::get('/libros/create', [LibroWebController::class, 'create']);
Route::post('/libros', [LibroWebController::class, 'store']);
Route::get('/libros/{id}/edit', [LibroWebController::class, 'edit']);
Route::put('/libros/{id}', [LibroWebController::class, 'update']);
Route::delete('/libros/{id}', [LibroWebController::class, 'destroy']);


Route::get('/', function () {
    return view('welcome');
});
