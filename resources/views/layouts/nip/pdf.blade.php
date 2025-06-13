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
                border: 2px solid black;
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

        <div class="titulo">Lista de IPs da PRIP</div>

        <div class="container" style="width=100%">
        <table class="tabela">
            <thead>
                <tr>
                    <th><u>IP</u></th>
                    <th><u>PONTO</u></th>
                    <th><u>PATRIMÔNIO</u></th>
                    <th><u>RESPONSÁVEL</u></th>
                    <th><u>SEÇÃO</u></th>

                </tr>
            </thead>

            <tbody>
                {{ header('Content-type text/html; charset=ISO-8859-1'); }}
                @foreach ($nips as $nip)
                    <tr>
                        <td>{{ $nip->ip }}</td>
                        <td>{{ $nip->ponto }}</td>
                        <td>{{ $nip->patrimonio }}</td>
                        <td>{{ $nip->responsa }}</td>
                        <td>{{ $nip->secao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="page-break"></div>
    </body>
</html>

