@if(isset($cliente->id))

    <form method="post" action="{{ route('cliente.update',$cliente) }}">
    @method('PUT')

@else

    <form method="post" action="{{ route('cliente.store') }}">

@endif

    @csrf

    <input type="text" name="nome"  class="{{ $classe }}" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome do Cliente">
    {{ ($errors->has('nome')) ? $errors->first('nome') : ''}}

    <button type="submit" class="botda-preta">Cadastrar</button>
</form>