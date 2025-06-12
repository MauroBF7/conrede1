{{-- View principal dos Telefones --}}
@extends('layouts.app')

@section('content')
    <script>
        function confirmaDelete() {
            return confirm("Certeza de apagar esse registro?");
        }
    </script>
    <div class="card">
        <div class="card-header h4">Telefones PRIP Cadastrados
            <button type="button" class="btn btn-secundary float-right">
                <a href="{{ route('telefones.exportacao') }}" target="_blank">
                    <i class="fa fa-file-pdf" aria-hidden="true" title="Lista PDF"></i></button></a>
        </div>

        <div class="card-body">
            <table class="table table-striped datatable-simples dt-buttons dt-fixed-header">
                <thead>
                    <tr>
                        @can('manager')
                            <th scope="col-sm-2">ID</th>
                        @endcan
                        <th scope="col-4">RAMAL</th>
                        <th scope="col-1">RESPONSÁVEL</th>
                        <th scope="col-6">DIVISÃO</th>
                        <th scope="col-1">SEÇÃO</th>
                        <th scope="col-1">LOCAL</th>
                        <th scope="col-1">ALTERAR</th>
                        @can('manager')<th scope="col-1">AÇÃO</th>@endcan
                    </tr>
                </thead>
                <tbody>
                    @csrf
                    @foreach ($telefones as $telefone)
                        <tr>
                            @can('manager')
                                <td size="3"><a
                                        href="{{ route('telefones.edit', ['telefone' => $telefone, 'divisas' => $divisas]) }}">
                                        {{ $telefone->id }}</a>
                                </td>
                            @endcan

                            <td>{{ $telefone->ramaln }}</td>
                            <td>{{ $telefone->responsa }}</td>
                            <td>@include('layouts.telefones.partials.divisas')</td>
                            <td>{{ $telefone->secao }}</td>
                            <td>
                                @forelse($enderecos as $endereco)
                                    {{ $telefone->enderecos_id == $endereco->id ? $endereco->local : '' }}
                                @empty
                                    Sem divisão
                                @endforelse
                            </td>
                            <td class="tdbotao">
                                <a href="{{ route('telefones.troca', ['telefone' => $telefone, 'divisas' => $divisas]) }}">
                                    <i class="fa fa-edit" title="solicitar alteração"></i></a>
                            </td>
                            @can('manager')es
                            <td>
                                <form id="form_{{ $telefone->id }}" method="post"
                                    action="{{ route('telefones.destroy', $telefone->id) }}"
                                    onsubmit="return confirmaDelete();">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-sm  btn-danger"><i class="fa fa-trash" aria-hidden="true"
                                            title="apagar registro"></i></button>

                                </form>


                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
