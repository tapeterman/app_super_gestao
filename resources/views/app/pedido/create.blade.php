@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            @if(isset($pedido->id))
                <h1>Pedido - Editar</h1>
            @else
                <h1>Pedido - Adicionar</h1>
            @endif
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        {{ $msg ?? '' }}
            <div class="contato-principal" style="width: 30%;margin-left:auto;margin-right:auto;">
                @component('app.pedido._components.form_create_edit',['clientes' =>$clientes,'classe' => $classe])
                @endcomponent
            </div>
        </div>  
    </div>
@endsection