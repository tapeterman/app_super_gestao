@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Lista de Produtos</h1>
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="contato-principal" style="width: 90%;margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade_ID</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>
                                    <a href="{{ route('app.fornecedor.editar',$produto->id)}}">Editar</a> | 
                                    <a href="{{ route('app.fornecedor.excluir',$produto->id)}}">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                <table>
                {{ $produtos->appends($request)->links() }}
                Exibindo 
                    {{ $produtos->count() }} 
                produtos de  
                {{ $produtos->total() }} 
                (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})  
            </div>
        </div> 
         
    </div>
@endsection