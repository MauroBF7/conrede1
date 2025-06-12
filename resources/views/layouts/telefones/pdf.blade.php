{{-- View de download da Lista em PDF --}}
<html>

    <head>


        <style>
            .page-break{
                page-break-after: always;
            }
            .titulo{
                border:1px solid black;
                background-color:#CCC;
                text-align:center;
                width:100%;
                font-weight:bold;
                margin-botton:35px;
                font-size:medium;
            }

            .tabela{
                border: 1px solid black;
                text-align:center;
                width:100%;
                margin-botton:35px;
                font-size:medium;
            }
            .td, td{
                border-bottom: 1px solid #ddd;
            }

            .table th{
                border: 1px solid black;
                text-align:left;
            }
            .tabela tbody tr:nth-child(even){
                border: 1px solid black;
                background-color: #CCC;
            }
            .tabela tbody tr:nth-child(odd){
                border: 1px solid black;
                background-color: #FFF;
            }


        </style>
    </head>
    <body>
        <div class="titulo">Lista de Ramais da PRIP</div>

        <div class="container" style="width=100%">
        <table class="tabela">
            <thead>
                <tr>
                    <th>RAMAL</th>
                    <th>RESPONSÁVEL</th>
                    <th>DIVISÃO</th>
                    <th>SEÇÃO</th>
                    <th>LOCAL</th>
                </tr>
                <tr></tr>
            </thead>
            <tbody>
                {{ header('Content-type text/html; charset=ISO-8859-1'); }}
                @foreach ($telefones as $telefone)
                    <tr>
                        <td>{{ $telefone->ramaln }}</td>
                        <td>{{ $telefone->responsa }}</td>
                        <td>@forelse($divisas as $divisa)
                            {{ $telefone->divisas_id == $divisa->id ? $divisa->sigla : ''}}
                            @empty
                                Sem divisão
                            @endforelse
                        </td>
                        <td>{{ $telefone->secao }}</td>
                        <td>
                            @forelse($enderecos as $endereco)
                                {{ $telefone->enderecos_id == $endereco->id ? $endereco->local : ''}}
                            @empty
                                Sem divisão
                            @endforelse
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="page-break"></div>
    </body>
</html>

