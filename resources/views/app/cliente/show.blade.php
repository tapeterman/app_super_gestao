@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Visualizar Cliente</h1>
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div class="contato-principal" style="width: 30%;margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <tbody>
                            <tr>
                                <td>Nome</td>
                                <td>{{ $cliente->nome }}</td>
                            </tr>
                    </tbody>
                <table>
        </div>  
    </div>
@endsection