@forelse($divisas as $divisa)
    {{ $telefone->divisas_id == $divisa->id ? $divisa->sigla : '' }}
@empty
    Sem divisão
@endforelse
