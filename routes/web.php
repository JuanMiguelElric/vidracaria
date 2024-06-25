<?php

use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Fornecedor\FornecedorController;
use App\Http\Controllers\Funcionario\FuncionarioController;
use App\Http\Controllers\OrdemdeServicos\OrdemdesericosController;
use App\Http\Controllers\Produto\ProdutoController;
use App\Http\Controllers\Servico\ServicoController;
use App\Models\OrdemServico;
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
Route::get('/clientejson',[ClienteController::class,'ClienteJson'])->name('cliente.json');
Route::resource('cliente',ClienteController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('cliente.index');
});
Route::get('/fornecedorjson',[FornecedorController::class,'fornecedorJson'])->name('fornecedor.json');
Route::resource('fornecedor',FornecedorController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('fornecedor.index');
});
Route::resource('funcionario',FuncionarioController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('funcionario.index');
});
Route::get('/produtojson',[ProdutoController::class, 'produtoJson'])->name('produto.json');
Route::resource('produto',ProdutoController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('produto.index');
});
Route::resource('ordemdeservico',OrdemdesericosController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('ordemdeservico.index');
});
Route::get('/ordemdeservicojson',[OrdemdesericosController::class,'ordemJson'])->name('ordemdeservico.json');
Route::get('/servicolist',[ServicoController::class,'ServicoJson']);
Route::resource('servico',ServicoController::class)->only(['index','create','store','delete','update','edit','show','destroy'])->missing(function(){
    return to_route('ordemdeservico.index');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
