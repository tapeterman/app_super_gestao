@if(isset($cliente->id))

    <form method="post" action="{{ route('cliente.update',$cliente) }}">
    @method('PUT')

@else

    <form method="post" action="{{ route('cliente.store') }}">

@endif

    @csrf

    <select name="fornecedor_id" class="{{ $classe }}">
        <option value="">-- Selecione o Fornecedor -- </option>
        @foreach ($fornecedores as $key => $fornecedor)
            <option value="{{ $fornecedor->id }}" {{ $fornecedor->id ??  old('fornecedor_id') == $fornecedor->id ? 'selected' : ''}}>{{ $fornecedor->nome }}</option>
        @endforeach
    </select>
    {{ ($errors->has('fornecedor_id')) ? $errors->first('fornecedor_id') : ''}}

    <input type="text" name="nome"  class="{{ $classe }}" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome do produto">
    {{ ($errors->has('nome')) ? $errors->first('nome') : ''}}

    <input type="text" name="descricao"  class="{{ $classe }}" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição do Produto">
    {{ ($errors->has('descricao')) ? $errors->first('descricao') : ''}}

    <input type="text" name="peso"    class="{{ $classe }}" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso">
    {{ ($errors->has('peso')) ? $errors->first('peso') : ''}}

    <select name="unidade_id" class="{{ $classe }}">
        <option value="">Selecione o tipo de unidade!</option>
        @foreach ($unidades as $key => $unidade)
            <option value="{{ $unidade->id }}" {{ $unidade->id ??  old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->unidade.'-'.$unidade->descricao }}</option>
        @endforeach
    </select>
    {{ ($errors->has('unidade_id')) ? $errors->first('unidade_id') : ''}}

    <button type="submit" class="botda-preta">Atualizar Produto</button>
</form>