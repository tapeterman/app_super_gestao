@extends('site.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>
        <div class="informacao-pagina">
            @component('site.layouts._components.form_login',['classe' => 'borda-preta'])
            @endcomponent
            {{ isset($erro) && $erro != '' ? $erro : '' }}
        </div>  
    </div>
@endsection