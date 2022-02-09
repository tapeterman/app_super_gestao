<form method="post" action="{{ route('pedido-produto.store',$pedido) }}">
    @csrf


    <select name="produto_id" class="{{ $classe }}">
        <option value="">-- Selecione o produto -- </option>
        @foreach ($produtos as $key => $produto)
            <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : ''}}>{{ $produto->nome }}</option>
        @endforeach
    </select>
    {{ ($errors->has('produto_id')) ? $errors->first('produto_id') : ''}}

    <input type="number" name="quantidade"  class="{{ $classe }}" value="{{ old('quantidade') }}" placeholder="Quantidade do Produto">
    {{ ($errors->has('quantidade')) ? $errors->first('quantidade') : ''}}

    <button type="submit" class="botda-preta">Cadastrar</button>
    
</form>