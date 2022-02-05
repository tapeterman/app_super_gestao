<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function  index(){

        return view('app.fornecedor.index',['titulo' =>'Fornecedor']);
    }

    public function  listar(Request $request){

        $nome   = '%'.$request->input('nome').'%';
        $email  = '%'.$request->input('email').'%';
        $uf     = '%'.$request->input('uf').'%';
        $site   = '%'.$request->input('site').'%';

        $fornecedores = Fornecedor::with(['produtos'])->where('nome','like',$nome)
                                  ->where('email','like',$email)
                                  ->where('uf','like',$uf)
                                  ->where('site','like',$site)
                                  ->paginate(10);

        return view('app.fornecedor.listar',['titulo' =>'Produtos','fornecedores' => $fornecedores,'request' => $request->all()]);
    }

    public function  adicionar(Request $request){

        $msg = '';


        if($request->input('_token') != ''){
            $regras =[
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'email'
            ];
            
            $feedback = [
                'email.email'   => 'O campo usuario (E-mail) é obrigatório',
                'nome.min'      => 'O campo :attribute deve ter no mínimo 3 caracteres',
                'nome.max'      => 'O campo :attribute deve ter no máximo 40 caracteres',
                'uf.min'        => 'O campo :attribute deve ter 2 caracteres',
                'uf.max'        => 'O campo :attribute deve ter 2 caracteres',
                'required'      => 'O campo :attribute precisa ser preenchido'
    
            ];

            $request->validate($regras,$feedback);
            
           

            //editar fornecedor
            if($request->id != ''){

                $fornecedor = Fornecedor::find($request->input('id')); 
                $update = $fornecedor->update($request->all());
                if($update){
                    $msg = 'Fornecedor Atualizado com Sucesso!';
                } else {
                    $msg = 'Ops! Algo deu errado na atualização!';
                }
                return view('app.fornecedor.editar',['titulo' =>'Fornecedor','id' => $request->id, 'msg' => $msg]);
            } 
            //novo fornecedor
            else {

                $fornecedor = new Fornecedor();
                $fornecedor->create($request->all());
                $msg = 'Cadastro Realizado com Sucesso!';

            }
        }
        return view('app.fornecedor.adicionar',['titulo' =>'Fornecedor', 'msg' => $msg]);
        
    }

    public function  editar($id,$msg = ''){

        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar',['titulo' =>'Fornecedor','fornecedor' =>$fornecedor]);
    }

    public function  excluir($id){
        
        $fornecedor = Fornecedor::find($id)->delete();
        if($fornecedor){
            $msg = 'Fornecedor excluido com sucesso!';
        }else{
            $msg = 'Ops! algo deu errado ao deletar o fornecedor!';
        }
        return view('app.fornecedor.index',['titulo' =>'Fornecedor','msg' => $msg]);
    }

}

