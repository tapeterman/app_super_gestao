@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Visualizar - Adicionar</h1>
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
                <table border="1" width="100%">
                    <tbody>
                            <tr>
                                <td>Nome</td>
                                <td>{{ $produto->nome }}</td>
                            </tr>
                            <tr>
                                <td>Descrição</td>
                                <td>{{ $produto->descricao }}</td>
                            </tr>
                            <tr>
                                <td>Peso</td>
                                <td>{{ $produto->peso }}</td>
                            </tr>
                            <tr>
                                <td>Unidade_id</td>
                                <td>{{ $produto->unidade_id }}</td>
                            </tr>
                    </tbody>
                <table>
        </div>  
    </div>
@endsection