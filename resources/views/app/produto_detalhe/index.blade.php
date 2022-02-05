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
                <li><a href="{{ route('produto-detalhe.create') }}">Novo</a></li>
                <li><a href="{{ route('produto-detalhe.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="contato-principal" style="width: 90%;margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>produto_id</th>
                            <th>comprimento</th>
                            <th>largura</th>
                            <th>altura</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtoDetalhes as $produtoDetalhe)
                            <tr>
                                <td>{{ $produtoDetalhe->produto_id }}</td>
                                <td>{{ $produtoDetalhe->comprimento }}</td>
                                <td>{{ $produtoDetalhe->largura }}</td>
                                <td>{{ $produtoDetalhe->altura }}</td>
                                <td>
                                    <a href="{{ route('produto-detalhe.show',$produtoDetalhe->id) }}">Detalhes</a>|
                                    <a href="{{ route('produto-detalhe.edit',$produtoDetalhe) }}">Editar</a>|
                                    <form id="form_{{ $produtoDetalhe->id }}" method="post" action="{{ route('produto-detalhe.destroy',$produtoDetalhe->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $produtoDetalhe->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                <table>
                {{ $produtoDetalhes->appends($request)->links() }}
                Exibindo 
                    {{ $produtoDetalhes->count() }} 
                produtos de  
                {{ $produtoDetalhes->total() }} 
                (de {{ $produtoDetalhes->firstItem() }} a {{ $produtoDetalhes->lastItem() }})  
            </div>
        </div> 
         
    </div>
@endsection