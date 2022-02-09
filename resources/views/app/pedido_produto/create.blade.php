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
            <h4>Itens do Pedido</h4>
            <table border="1"  style="width: 30%;margin-left:auto;margin-right:auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Data de inclusão do Item</th>
                        <th>Retirar do produto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $key => $pedidoProdutos)
                        <tr>
                            <td>{{ $pedidoProdutos->id }}</td>
                            <td>{{ $pedidoProdutos->nome }}</td>
                            <td>{{ $pedidoProdutos->pivot->quantidade }}</td>
                            <td>{{ $pedidoProdutos->pivot->created_at }}</td>
                            <td>
                                <form id="form_{{ $pedidoProdutos->pivot->id }}" method="post" action="{{ route('pedido-produto.destroy',[
                                                        'pedidoProduto'=>$pedidoProdutos->pivot->id,
                                                        'pedido_id' => $pedido->id
                                                    ])
                                                }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $pedidoProdutos->pivot->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            <table>
        </div>  
    </div>
@endsection