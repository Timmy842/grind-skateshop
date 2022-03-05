<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProductosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes Index

Route::get('/', function () {
    return view('index');
});

// Routes Productos

Route::get('productos.tablas', [ProductosController::class, 'verTablas']);
Route::get('productos.tabla.{id_producto}', [ProductosController::class, 'verTabla']);

Route::get('productos.ejes', [ProductosController::class, 'verEjes']);
Route::get('productos.eje.{id_producto}', [ProductosController::class, 'verEje']);

// Routes Marcas

Route::get('marcas.marca.{id_marca}', [MarcasController::class, 'show']);
Route::get('marcas.index', [MarcasController::class, 'index']);