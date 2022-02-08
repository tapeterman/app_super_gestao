@if(isset($pedido->id))

    <form method="post" action="{{ route('pedido.update',$cliente) }}">
    @method('PUT')

@else

    <form method="post" action="{{ route('pedido.store') }}">

@endif

    @csrf

    <select name="cliente_id" class="{{ $classe }}">
        <option value="">-- Selecione o Cliente -- </option>
        @foreach ($clientes as $key => $cliente)
            <option value="{{ $cliente->id }}" {{ $cliente->id ??  old('cliente_id') == $cliente->id ? 'selected' : ''}}>{{ $cliente->nome }}</option>
        @endforeach
    </select>
    {{ ($errors->has('cliente_id')) ? $errors->first('cliente_id') : ''}}

    <button type="submit" class="botda-preta">Cadastrar</button>
    
</form>