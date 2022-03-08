<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;

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

Route::get('/', [ProductosController::class, 'index']);

// Routes Productos

Route::get('tablas', [ProductosController::class, 'verTablas']);
Route::get('productos.tabla.{id_producto}', [ProductosController::class, 'verTabla']);

Route::get('ejes', [ProductosController::class, 'verEjes']);
Route::get('productos.eje.{id_producto}', [ProductosController::class, 'verEje']);

Route::get('ruedas', [ProductosController::class, 'verRuedas']);
Route::get('productos.rueda.{id_producto}', [ProductosController::class, 'verRueda']);

Route::get('productos.{id_producto}.{tipo_id}', [ProductosController::class, 'verProductos']); // Desde cada marca poder ir a un producto

// Routes Marcas

Route::get('marca.{id_marca}', [MarcasController::class, 'show']);

Route::resource('marcas', MarcasController::class);

// Routes Usuarios

Route::get('login', [UsuariosController::class, 'index']);