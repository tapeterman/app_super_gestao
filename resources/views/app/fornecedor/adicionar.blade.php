@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Fornecedor - Adicionar</h1>
        </div>
        <br>  
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div class="contato-principal" style="width: 30%;margin-left:auto;margin-right:auto;">
                <form method="post" action="{{ route('app.fornecedor.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? old('id') }}">
                    @csrf
                    <input type="text" name="nome"  class="borda-preta" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="nome">
                    {{ ($errors->has('nome')) ? $errors->first('nome') : ''}}
                    <input type="text" name="site"  class="borda-preta" value="{{ $fornecedor->site ?? old('site') }}" placeholder="site">
                    {{ ($errors->has('site')) ? $errors->first('site') : ''}}
                    <input type="text" name="uf"    class="borda-preta" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="uf">
                    {{ ($errors->has('uf')) ? $errors->first('uf') : ''}}
                    <input type="text" name="email" class="borda-preta" value="{{ $fornecedor->email ?? old('email') }}" placeholder="email">
                    {{ ($errors->has('email')) ? $errors->first('email') : ''}}
                    <button type="submit" class="botda-preta">Cadastrar</button>
                </form>
            </div>
        </div>  
    </div>
@endsection