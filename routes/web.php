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

Route::get('/', [PrincipalController::class, 'principal']);
Route::get('/sobre-nos', [SobreNosController::class , 'principal']);
Route::get('/contato', [ContatoController::class,'principal']);

Route::get('/login', function(){return "Login";});
Route::get('/clientes', function(){return "clientes";});
Route::get('/fornecedores', function(){return "fornecedores";});
Route::get('/produtos', function(){return "produtos";});

//Route::get($uri,$callback)



