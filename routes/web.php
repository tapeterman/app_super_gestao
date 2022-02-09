<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PrincipalController,SobreNosController,ContatoController,TesteController,FornecedorController,LoginController};
use App\Http\Controllers\{HomeController,ClienteController,ProdutoController,ProdutoDetalheController,PedidoController,PedidoProdutoController};

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



Route::get('/', [PrincipalController::class, 'index'])->name('site.index');
Route::post('/', [PrincipalController::class, 'salvar'])->name('site.index');

Route::get('/sobre-nos', [SobreNosController::class , 'index'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class,'index'])->name('site.contato');
Route::post('/contato', [ContatoController::class,'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class,'index'])->name('site.login');
Route::post('/login', [LoginController::class,'autenticar'])->name('site.login');

Route::middleware('autenticacao') 
    ->prefix('/app')->group(function(){

    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    
    Route::get('/fornecedor',                           [FornecedorController::class, 'index'])     ->name('app.fornecedor');
    Route::post('/fornecedor/listar',                   [FornecedorController::class, 'listar'])    ->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar',                    [FornecedorController::class, 'listar'])    ->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar',                 [FornecedorController::class, 'adicionar']) ->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar',                [FornecedorController::class, 'adicionar']) ->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}',        [FornecedorController::class, 'editar'])    ->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}',              [FornecedorController::class, 'excluir'])   ->name('app.fornecedor.excluir');

    Route::get('/sair', [LoginController::class,'sair'])->name('app.sair');

    Route::resource('produto',ProdutoController::class);
    Route::resource('produto-detalhe',ProdutoDetalheController::class);
    Route::resource('cliente',ClienteController::class);
    Route::resource('pedido',PedidoController::class);
    //Route::resource('pedido-produto',PedidoProdutoController::class);
    Route::get('pedido-produto/create/{pedido}',[PedidoProdutoController::class,'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/create/{pedido}',[PedidoProdutoController::class,'store'])->name('pedido-produto.store');
    Route::post('pedido-produto/destroy/{pedido}',[PedidoProdutoController::class,'destroy'])->name('pedido-produto.destroy');

});



Route::fallback(function(){
    echo 'A rota acessada não existe,  para ir para pagina inicial <a href="'.route('site.index').'">clique aqui</a>';
});
