{{ $slot }}

<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="{{ $classe }}"><br>

        {{ ($errors->has('nome')) ? $errors->first('nome') : ''}}

    <input type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $classe }}"><br>
    
        {{ ($errors->has('telefone')) ? $errors->first('telefone') : ''}}

    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="{{ $classe }}"><br>
        
        {{ ($errors->has('email')) ? $errors->first('email') : ''}}

    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select><br>

    {{ ($errors->has('motivo_contatos_id')) ? $errors->first('motivo_contatos_id') : ''}}

    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea><br>

     {{ ($errors->has('mensagem')) ? $errors->first('mensagem') : ''}}

    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
