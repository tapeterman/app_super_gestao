<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function principal(Request $request){
        
        /*metodo
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        
        //metodo fill
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        
        metodo create
        $contato = new SiteContato();
        $contato->create($request->all());

        print_r($request->All());*/
        return view('site.contato',['titulo' => 'Contato (teste)']);
    }

    public function salvar(Request $request){
        
        //realizar validação dos dados enviados via request

        $request->validate([
            'nome'              => 'required',
            'telefone'          => 'required',
            'email'             => 'required',
            'motivo_contato'    => 'required',
            'mensagem'          => 'required',

        ]);

        //SiteContato::create($request->all());
       

        return view('site.contato',['titulo' => 'Contato (teste)']);
    }
}

