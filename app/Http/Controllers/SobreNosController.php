<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{

    public function index(){
        return view('site.sobre-nos',['titulo' =>'Sobre-Nos']);
    }
}

