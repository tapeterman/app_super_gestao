@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Lista de Pedidos</h1>
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="contato-principal" style="width: 90%;margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th>Vender</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create',$pedido->id) }}">Adicionar Produtos</a></td>
                                <td>
                                    <a href="{{ route('pedido.show',$pedido->id) }}">Detalhes</a>|
                                    <a href="{{ route('pedido.edit',$pedido) }}">Editar</a>|
                                    <form id="form_{{ $pedido->id }}" method="post" action="{{ route('pedido.destroy',$pedido->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                <table>
                {{ $pedidos->appends($request)->links() }}
                Exibindo 
                    {{ $pedidos->count() }} 
                Clientes de  
                {{ $pedidos->total() }} 
                (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})  
            </div>
        </div> 
         
    </div>
@endsection