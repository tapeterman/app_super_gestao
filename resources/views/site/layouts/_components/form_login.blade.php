{{ $slot }}

<div style="width:30%;margin-left:auto;margin-right:auto;">
<form action="{{ route('site.login') }}" method="post">
    @csrf
    <input type="text" name="usuario" value="{{ old('usuario') }}" placeholder="Usuário" class="{{ $classe }}"><br>
        {{ ($errors->has('usuario')) ? $errors->first('usuario') : ''}} 
    <input type="password" name="senha" value="{{ old('senha') }}" placeholder="Senha" class="{{ $classe }}"><br>
        {{ ($errors->has('senha')) ? $errors->first('senha') : ''}} 
    <button type="submit" class="{{ $classe }}">Acessar</button>
</form>
</div>
