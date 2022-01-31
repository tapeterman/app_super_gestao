@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Fornecedor</h1>
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        <div class="contato-principal" style="width: 30%;margin-left:auto;margin-right:auto;">
               
                <form method="post" action="{{ route('app.fornecedor.listar') }}">
                 @csrf
                    <input type="text" name="nome"  class="borda-preta" placeholder="nome">
                    <input type="text" name="site"  class="borda-preta" placeholder="site">
                    <input type="text" name="uf"    class="borda-preta" placeholder="uf">
                    <input type="text" name="email" class="borda-preta" placeholder="email">
                    <button type="submit" class="botda-preta">Pesquisar</button>
                </form>
            </div>
        </div>  
    </div>
@endsection