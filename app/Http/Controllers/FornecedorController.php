<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function  index(){

        return view('app.fornecedor.index',['titulo' =>'Fornecedor']);
    }

    public function  listar(){

        return view('app.fornecedor.listar',['titulo' =>'Fornecedor']);
    }

    public function  adicionar(){

        
        return view('app.fornecedor.adicionar',['titulo' =>'Fornecedor']);
    }

}

