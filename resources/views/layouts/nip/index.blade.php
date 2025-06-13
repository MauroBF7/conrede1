{{-- View principal dos Telefones --}}
@extends('layouts.app')

@section('content')
    <script>
        function confirmaDelete() {
            return confirm("Certeza de apagar esse registro?");
        }
    </script>
    <div class="card">
        <div class="card-header h4">IPs da PRIP - Prédio CARE
            <button type="button" class="btn btn-secundary float-right">
                <a href="{{ route('nip.exportacao') }}" target="_blank">
                    <i class="fa fa-file-pdf" aria-hidden="true" title="Lista PDF"></i></button></a>
        </div>

        <div class="card-body">
            <table class="table table-striped  btn-spinner datatable-simples dt-paging-50 dt-buttons dt-fixed-header">
                <thead>
                    <tr>
                        @can('manager') <th>ID</th> @endcan
                        <th>IP</th>
                        <th>PATCH</th>
                        <th>PORTA</th>
                        <th>PONTO</th>
                        <th>RESPONSÁVEL</th>
                        <th>SEÇÃO</th>
                        @can('manager') <th>AÇÃO</th> @endcan
                    </tr>
                </thead>
                <tbody>
                    @csrf
                    @foreach ($nips as $nip)
                        <tr>
                            @can('manager')
                                <td>
                                    <a href="{{ route('nip.edit', $nip->id) }}">{{ $nip->id }}</a>
                                </td>
                            @endcan

                            <td>{{ $nip->ip }}</td>
                            <td>{{ $nip->pathpanel }}</td>
                            <td>{{ $nip->porta }}</td>
                            <td>{{ $nip->ponto }}</td>
                            <td>{{ $nip->responsa }}</td>
                            <td>{{ $nip->secao }}</td>
                            @can('manager')
                            <td>
                                <a href="{{ route('nip.edit', $nip->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

