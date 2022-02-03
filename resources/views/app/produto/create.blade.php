@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            @if(isset($produto->id))
                <h1>Produto - Editar</h1>
            @else
                <h1>Produto - Adicionar</h1>
            @endif
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div class="contato-principal" style="width: 30%;margin-left:auto;margin-right:auto;">
                @component('app.produto._components.form_create_edit',['produto' =>$produto,'classe' => $classe, 'unidades' =>$unidades])
                @endcomponent
            </div>
        </div>  
    </div>
@endsection