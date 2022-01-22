<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PrincipalController,SobreNosController,ContatoController};

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
/*
Route::get('/', function () {
    return "ola seja bem vindo";
});
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class , 'principal'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class,'principal'])->name('site.contato');
Route::get('/login', function(){return "Login";})->name('site.login');


//agrupamento de rotas
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return "clientes";})->name('app.clientes');
    Route::get('/fornecedores', function(){return "fornecedores";})->name('app.fornecedores');
    Route::get('/produtos', function(){return "produtos";})->name('app.produtos');
});

Route::get('/rota1', function(){return "rota1";})->name('app.rota1');
Route::get('/rota2', function(){return redirect()->route('app.rota1');}
)->name('app.rota2');

//Route::redirect('/rota2','/rota1');