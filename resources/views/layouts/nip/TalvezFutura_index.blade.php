@extends('layouts.app')

@section('content')
    <style>
        .status-icon {
            font-size: 1.2em;
        }
    </style>

    <script>
        function confirmaDelete() {
            return confirm("Certeza de apagar esse registro?");
        }

        function testarIP(ip, id) {
            fetch(`/conrede/ping/${ip}`)
                .then(response => response.json())
                .then(data => {
                    const iconSpan = document.getElementById(`status-${id}`);
                    if (data.online) {
                        iconSpan.innerHTML = '🟢';
                        iconSpan.title = 'Máquina está ligada';
                    } else {
                        iconSpan.innerHTML = '🔴';
                        iconSpan.title = 'Máquina não está respondendo';
                    }
                })
                .catch(error => {
                    console.error('Erro ao testar IP:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', () => {
            @foreach ($nips as $nip)
                testarIP('{{ $nip->ip }}', '{{ $nip->id }}');
            @endforeach
        });
    </script>

    <div class="card">
        <div class="card-header h4">
            IPs da PRIP - Prédio CARE
            <button type="button" class="btn btn-secundary float-right">
                <a href="{{ route('nip.exportacao') }}" target="_blank">
                    <i class="fa fa-file-pdf" aria-hidden="true" title="Lista PDF"></i>
                </a>
            </button>
        </div>

        <div class="card-body">
            <table class="table table-striped datatable-simples dt-buttons dt-fixed-header">
                <thead>
                    <tr>
                        @can('manager')
                            <th scope="col-sm-2">ID</th>
                        @endcan
                        <th>IP</th>
                        <th>Status</th>
                        <th>PATCH</th>
                        <th>PORTA</th>
                        <th>PONTO</th>
                        <th>RESPONSÁVEL</th>
                        <th>SEÇÃO</th>
                        @can('manager')
                            <th>AÇÃO</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @csrf
                    @foreach ($nips as $nip)
                        <tr>
                            @can('manager')
                                <td>
                                    <a href="{{ route('nip.edit', $nip->id) }}">
                                        {{ $nip->id }}
                                    </a>
                                </td>
                            @endcan

                            <td>{{ $nip->ip }}</td>
                            <td><span id="status-{{ $nip->id }}" class="status-icon">⏳</span></td>
                            <td>{{ $nip->patchpanel }}</td>
                            <td>{{ $nip->porta }}</td>
                            <td>{{ $nip->ponto }}</td>
                            <td>{{ $nip->responsa }}</td>
                            <td>{{ $nip->secao }}</td>

                            @can('manager')
                                <td>
                                    <form method="POST" action="{{ route('nip.destroy', $nip->id) }}"
                                          onsubmit="return confirmaDelete();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-sm btn-danger">
                                            <i class="fa fa-trash" title="Apagar registro"></i>
                                        </button>
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