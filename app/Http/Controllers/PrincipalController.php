<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;


class PrincipalController extends Controller
{
    public function index(){

        $motivo_contatos = MotivoContato::All();
        return view('site.principal',['titulo' => 'Home','motivo_contatos' =>$motivo_contatos]);

    }
}
