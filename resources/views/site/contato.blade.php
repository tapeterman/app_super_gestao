@extends('site.layouts.layout')

@section('titulo','Contato')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>
        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato',['classe' => 'borda-preta','motivo_contatos' =>$motivo_contatos])
                    <p>A nossa equipe analisará a sua mensagem e retornaremos o mais breve possível!</p>
                    <p>Retornaremos em até 24 horas.</p>
                @endcomponent
            </div>
        </div>  
    </div>
@endsection