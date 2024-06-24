<?php

use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Fornecedor\FornecedorController;
use App\Http\Controllers\Funcionario\FuncionarioController;
use App\Http\Controllers\Produto\ProdutoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('cliente',ClienteController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('cliente.index');
});
Route::resource('fornecedor',FornecedorController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('fornecedor.index');
});
Route::resource('funcionario',FuncionarioController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('funcionario.index');
});
Route::resource('produto',ProdutoController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('produto.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
