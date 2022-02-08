@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            @if(isset($cliente->id))
                <h1>Editar pedido</h1>
            @else
                <h1>Criar novo Pedido</h1>
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
                <h4>Detalhes do pedido:</h4> 
                <p>Id do pedido: {{ $pedido->id }}</p> 
                <p>cliente:{{ $pedido->cliente_id }}</p>
            
            <div class="contato-principal" style="width: 30%;margin-left:auto;margin-right:auto;">
                @component('app.pedido_produto._components.form_create',['classe' => $classe, 'produtos' =>$produtos,'pedido' =>$pedido])
                @endcomponent
            </div>
        </div>  
    </div>
@endsection