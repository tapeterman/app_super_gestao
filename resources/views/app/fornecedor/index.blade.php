<h3>fornecedor</h3>

<br />
{{-- fica o comentario que sera descartado pelo interpretador do blade --}}


Fornecedor:{{ $fornecedores[0]['nome'] }}
<br />
status: {{ $fornecedores[0]['status'] }}
<br />
@unless($fornecedores[0]['status']=='S')
    fornecedor inativo
@endunless

<br />
    
