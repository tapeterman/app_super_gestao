@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            @if(isset($cliente->id))
                <h1>Produto - Editar</h1>
            @else
                <h1>Produto - Adicionar</h1>
            @endif
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div class="contato-principal" style="width: 30%;margin-left:auto;margin-right:auto;">
                @component('app.cliente._components.form_create_edit',['cliente' =>$cliente,'classe' => $classe])
                @endcomponent
            </div>
        </div>  
    </div>
@endsection