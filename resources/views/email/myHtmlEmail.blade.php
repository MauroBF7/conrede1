<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTG-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, inital-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            p{
                font-size: 14px;
            }
            .signature{
                font-style: italic;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <div class="card-header h4">
              Solicitação de alterações para o registro nº {{ $responsa['id'] }}
            </div>
            <div class="card-body">
                <p>{{ $name }},</p>
                <p><b>Solicitação de troca de informações</b></p>
                <p><hr></p>
                <p><b>Ramal:{{ $responsa['ramaln'] }}</p></b>
                <p><b>Reponsável pelo ramal:</b> {{ $responsa['responsa'] }}
                <p><b>Divisão:</b> {{$responsa['divisas_id'] }}
                <p><b>Seção:</b> {{ $responsa['secao'] }}</p>
                <p><b>Local:</b> {{ $responsa['enderecos_id'] }}</p>
                <p><hr></p>
                <p class="signature">Email enviado por PRIP - Ramais</p>
            </div>
        </div>
    </body>
</html>
