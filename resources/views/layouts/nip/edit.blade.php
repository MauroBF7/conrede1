{{--blade para edição de registros de IPs--}}
@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header h4">

      Editando o IP, registro nº {{$nip->id}}
     <!-- Status da máquina -->
    <div style="margin-top: 10px;">
        <label>Status da Máquina</label><br>
        <span id="status-icon" style="font-size: 20px;">⏳</span>
        <span id="status-msg">Testando...</span><br>
        <small>
            <strong>Hostname:</strong> <span id="host-name">-</span><br>
            <strong>MAC:</strong> <span id="mac-address">-</span><br>
            <strong>Domínio:</strong> <span id="netbios">-</span>
        </small>
    </div>
    </div>
    <div class="card-body">
        <div class="mx-auto p-2" style="width: 500px;">
            <form action="{{ route('nip.update',['nip'=>$nip]) }}" method="post">
                @csrf
                @method('PUT')
                @include('layouts.nip.partials.edit-form')

                <button type="submit" class="btn btn-primary" style="border-radius: 15px; margin-top: 20px;">Salvar</button>
                {{-- <center><a href="{{ route('salvadivisa') }}" class="btn btn-primary" style="border-radius: 25px">Salvar</a></center> --}}
            </form>
        </div>
    </div>
  </div>
  <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ip = "{{ $nip->ip }}";

            fetch(`/conrede/ping/${ip}`)
                .then(response => response.json())
                .then(data => {
                    const icon = document.getElementById('status-icon');
                    const msg = document.getElementById('status-msg');
                    const host = document.getElementById('host-name');
                    const mac = document.getElementById('mac-address');
                    const netbios = document.getElementById('netbios');

                    if (data.online) {
                        icon.textContent = '🟢';
                        msg.textContent = 'Ligada';
                    } else {
                        icon.textContent = '🔴';
                        msg.textContent = 'Desligada ou não acessível';
                    }

                    host.textContent = data.hostname ?? '-';
                    mac.textContent = data.mac ?? '-';
                    netbios.textContent = data.dominio ?? '-';
                })
                .catch(error => {
                    document.getElementById('status-icon').textContent = '⚠️';
                    document.getElementById('status-msg').textContent = 'Erro ao testar';
                });
        });
    </script>
@endsection









