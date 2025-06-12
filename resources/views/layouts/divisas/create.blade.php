{{--blade para criação de Divisões--}}
@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header h4">
      +Cadastrando Divisões
    </div>
    <div class="card-body">
        <div class="mx-auto p-2" style="width: 500px;">
            <form action="{{ route('divisas.store') }}" method="post">
                @csrf
                @method('POST')
                <label for="">Sigla</label><p>
                <input type="text" name="sigla" style="border-radius: 15px"> <br /><p>
                <label for="">Descrição</label><br>
                {{--Colocar tamanho para esse input--}}
                <input type="text" name="descricao" size="60" style="border-radius: 15px"> <br /><p>
                <button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar</button>
                {{-- <center><a href="{{ route('endsalva') }}" class="btn btn-primary" style="border-radius: 25px">Salvar</a></center> --}}
            </form>
        </div>
    </div>
  </div>
@endsection
