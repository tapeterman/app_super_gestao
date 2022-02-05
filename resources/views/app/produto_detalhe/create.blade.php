@extends('app.layouts.layout')

@section('titulo',$titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-protegido">
            @if(isset($produtoDetalhe->id))
                <h1>Editar Detalhes do Produto</h1>
            @else
                <h1>Adicionar Detalhes do Produto</h1>
            @endif
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
                @component('app.produto_detalhe._components.form_create_edit',
                    [   'produtoDetalhe'=>$produtoDetalhe, 
                        'produtos' =>$produtos,
                        'classe' => $classe, 
                        'unidades' =>$unidades
                    ])
                @endcomponent
            </div>
        </div>  
    </div>
@endsection