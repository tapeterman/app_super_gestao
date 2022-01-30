@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Lista de Fornecedor</h1>
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</li>
            </ul>
        </div>
        <div class="informacao-pagina">
        <div class="contato-principal" style="width: 30%;margin-left:auto;margin-right:auto;">
                lista
            </div>
        </div>  
    </div>
@endsection