<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário ou Senha incorretos!';
        } elseif ($request->get('erro') == 2) {
            $erro = 'Necessário realizar Login para acesso a pagina!';
        }
        return view('site.login',['titulo' =>'Login','erro' => $erro]);
        
    }

    public function sair(Request $request){

        \session_destroy();
        return redirect()->route('site.index');
        
    }

    public function autenticar(Request $request){

        //regras do formulario de login
        $regras =[
            'usuario'        => 'email',
            'senha'          => 'required'
        ];
        
        $feedback = [
            'usuario.email'  => 'O campo usuario (E-mail) é obrigatório',
            'required'       => 'O campo :attribute precisa ser preenchido'

        ];

        //validação do formulario
        $request->validate($regras,$feedback);

        //recuperando dados do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o Model User

        $user = new User();
        $usuario = $user->where('email',$email)
                        ->where('password',$password)
                        ->get()
                        ->first();

        if (isset($usuario->name)){

            \session_start();
            $_SESSION['nome']= $usuario->name;
            $_SESSION['email']= $usuario->email;
            return redirect()->route('app.home');

        } else {

            return Redirect()->route('site.login',['erro' => 1]);

        }

        // SiteContato::create($request->all());   
        return 'chegamos até aqui';
        //return view('site.login',['titulo' =>'Login']);
        
    }
}
