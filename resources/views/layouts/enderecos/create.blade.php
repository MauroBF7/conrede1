{{--blade para criação de Endereços--}}
@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header h4">
      +Cadastrando Endereços
    </div>
    <div class="card-body">
        <div class="mx-auto p-2" style="width: 500px;">
            <form action="{{ route('enderecos.store') }}" method="post">
                @csrf
                @method('POST')
                <label for="">Local</label><p>
                <input type="text" name="local" style="border-radius: 15px"> <br /><p>
                <label for="">Endereço</label><br>
                {{--Colocar tamanho para esse input--}}
                <input type="text" name="endereco" size="60" style="border-radius: 15px"> <br /><p>
                <button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar</button>
                {{-- <center><a href="{{ route('endsalva') }}" class="btn btn-primary" style="border-radius: 25px">Salvar</a></center> --}}
            </form>
        </div>
    </div>
  </div>
@endsection









