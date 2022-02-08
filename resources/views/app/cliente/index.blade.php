@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Lista de Clientes</h1>
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="contato-principal" style="width: 90%;margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>
                                    <a href="{{ route('cliente.show',$cliente->id) }}">Detalhes</a>|
                                    <a href="{{ route('cliente.edit',$cliente) }}">Editar</a>|
                                    <form id="form_{{ $cliente->id }}" method="post" action="{{ route('cliente.destroy',$cliente->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                <table>
                {{ $clientes->appends($request)->links() }}
                Exibindo 
                    {{ $clientes->count() }} 
                Clientes de  
                {{ $clientes->total() }} 
                (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})  
            </div>
        </div> 
         
    </div>
@endsection