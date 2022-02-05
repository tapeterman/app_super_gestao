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
                            <th>Site</th>
                            <th>UF</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td>
                                    <a href="{{ route('app.fornecedor.editar',$fornecedor->id)}}">Editar</a> | 
                                    <a href="{{ route('app.fornecedor.excluir',$fornecedor->id)}}">Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <p>Lista de Produtos</p>
                                    <table border="1" style="margin:20px">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            @foreach ($fornecedor->produtos as $key => $produto)
                                                <tr>
                                                    <td>{{ $produto->id }}</td>
                                                    <td>{{ $produto->nome }}</td>
                                                </tr>
                                                
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                <table>
                {{ $fornecedores->appends($request)->links() }}
                Exibindo 
                    {{ $fornecedores->count() }} 
                fornecedores de  
                {{ $fornecedores->total() }} 
                (de {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})  
            </div>
        </div> 
         
    </div>
@endsection