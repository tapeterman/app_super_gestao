<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request){

        return view('app.produto',['titulo' =>'Produtos']);
        
    }
}
