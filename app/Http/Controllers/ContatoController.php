<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{SiteContato,MotivoContato};

class ContatoController extends Controller
{

    public function principal(Request $request){

        $motivo_contatos = MotivoContato::All();
        
        return view('site.contato',['titulo' => 'Contato (teste)','motivo_contatos' =>$motivo_contatos]);
    }

    public function salvar(Request $request){
        
        //realizar validação dos dados enviados via request
        
        $request->validate([
            'nome'              => 'required|min:3|max:40|unique:site_contatos',
            'telefone'          => 'required',
            'email'             => 'email',
            'motivo_contatos_id'=> 'required',
            'mensagem'          => 'required|max:2000',

        ],[
            'nome.min' => 'O campo nome precisa ter minimo 3 caracteres e no maximo 40 caracteres',
            'nome.max' => 'O campo nome precisa ter minimo 3 caracteres e no maximo 40 caracteres',
            'nome.unique' => 'Este nome já esta em uso',
            'email.email' => 'Precisa ser um e-mail valido',
            'mensagem.max' => 'Necessario preencher o campo com no maximo 2000 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido',

        ]);

        SiteContato::create($request->all());   
    
        return redirect()->route('site.index');
    }
}

