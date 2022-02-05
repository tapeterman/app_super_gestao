@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Visualizar - Detalhe do Produto</h1>
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto-detalhe.create') }}">Novo</a></li>
                <li><a href="{{ route('produto-detalhe.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div class="contato-principal" style="width: 30%;margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <tbody>
                            <tr>
                                <td>produto_id</td>
                                <td>{{ $produtoDetalhe->produto_id }}</td>
                            </tr>
                            <tr>
                                <td>comprimento</td>
                                <td>{{ $produtoDetalhe->comprimento }}</td>
                            </tr>
                            <tr>
                                <td>largura</td>
                                <td>{{ $produtoDetalhe->largura }}</td>
                            </tr>
                            <tr>
                                <td>altura</td>
                                <td>{{ $produtoDetalhe->altura }}</td>
                            </tr>
                            <tr>
                                <td>unidade_id</td>
                                <td>{{ $produtoDetalhe->unidade_id }}</td>
                            </tr>
                    </tbody>
                <table>
        </div>  
    </div>
@endsection