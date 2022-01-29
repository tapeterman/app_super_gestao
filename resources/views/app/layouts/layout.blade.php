<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        @include('app.layouts._partials.topo')
        
        @yield('conteudo')

        @include('app.layouts._partials.rodape')
    </body>
</html>