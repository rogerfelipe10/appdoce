<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FreteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::resource('produtos', ProdutoController::class)->except('show');
Route::resource('clientes', ClienteController::class)->except('show');
Route::resource('pedidos', PedidoController::class)->only(['index', 'create', 'store']);
Route::resource('fretes', FreteController::class)->except('show');
