@if(isset($produtoDetalhe->id))

    <form method="post" action="{{ route('produto-detalhe.update',$produtoDetalhe) }}">
    @method('PUT')

@else

    <form method="post" action="{{ route('produto-detalhe.store') }}">

@endif

    @csrf
    <select name="produto_id" class="{{ $classe }}">
        <option value="">Selecione o produto!</option>
        @foreach ($produtos as $key => $produto)
            <option value="{{ $produto->id }}" {{ $produto->id ??  old('produto_id') == $produto->id ? 'selected' : ''}}>{{ $produto->descricao}}</option>
        @endforeach
    </select>
    {{ ($errors->has('produto_id')) ? $errors->first('produto_id') : ''}}

    <input type="number" name="comprimento"  class="{{ $classe }}" value="{{ $produtoDetalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento Produto">
    {{ ($errors->has('comprimento')) ? $errors->first('comprimento') : ''}}

    <input type="number" name="largura"  class="{{ $classe }}" value="{{ $produtoDetalhe->largura ?? old('largura') }}" placeholder="Largura do produto">
    {{ ($errors->has('largura')) ? $errors->first('largura') : ''}}

    <input type="number" name="altura"    class="{{ $classe }}" value="{{ $produtoDetalhe->altura ?? old('altura') }}" placeholder="Altura do produto">
    {{ ($errors->has('altura')) ? $errors->first('altura') : ''}}

    <select name="unidade_id" class="{{ $classe }}">
        <option value="">Selecione o tipo de unidade!</option>
        @foreach ($unidades as $key => $unidade)
            <option value="{{ $unidade->id }}" {{ $unidade->id ??  old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->unidade.'-'.$unidade->descricao }}</option>
        @endforeach
    </select>
    {{ ($errors->has('unidade_id')) ? $errors->first('unidade_id') : ''}}

    <button type="submit" class="botda-preta">Cadastrar</button>
</form>