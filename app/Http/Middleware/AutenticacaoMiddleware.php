<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$metodo_autenticacao,$perfil)
    {
        //return $next($request);
        //verificar se o usuario possui acesso a rota
        if($metodo_autenticacao == 'padrao'){
            echo 'verificar o usuario e senha no banco de dados <br>';
        } else {
            echo 'Verificar o usuário e senha no AD <br>';
        }


        if(false){
            return $next($request);
        } else {
            return Response('Acesso negado! Rota exige autenticação!!!');
        }
    }
}
