@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            <h1>Produto - Adicionar</h1>
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
                <form method="post" action="{{ route('produto.store') }}">
                    @csrf
                    <input type="text" name="nome"  class="{{ $classe }}" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome do produto">
                    {{ ($errors->has('nome')) ? $errors->first('nome') : ''}}

                    <input type="text" name="descricao"  class="{{ $classe }}" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição do Produto">
                    {{ ($errors->has('descricao')) ? $errors->first('descricao') : ''}}

                    <input type="text" name="peso"    class="{{ $classe }}" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso">
                    {{ ($errors->has('peso')) ? $errors->first('peso') : ''}}

                    <select name="unidade_id" class="{{ $classe }}">
                        <option value="">Selecione o tipo de unidade!</option>
                        @foreach ($unidades as $key => $unidade)
                            <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->unidade.'-'.$unidade->descricao }}</option>
                        @endforeach
                    </select>
                    {{ ($errors->has('unidade_id')) ? $errors->first('unidade_id') : ''}}
                    <br>
                    <button type="submit" class="botda-preta">Atualizar Produto</button>
                </form>
            </div>
        </div>  
    </div>
@endsection