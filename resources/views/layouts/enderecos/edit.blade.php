{{--blade para edição de registros de Endereços--}}
@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header h4">

      Editando o endereco, registro nº {{$endereco->id}}
    </div>
    <div class="card-body">
        <div class="mx-auto p-2" style="width: 500px;">
            <form action="{{ route('enderecos.update',['endereco'=>$endereco]) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $endereco->id }}">
                <label for="">Local</label><p>
                <input type="text" name="local" style="border-radius: 15px" value="{{old('local',$endereco->local)}}"> <br /><p>
               {{-- {{ $errors->has('local') ? $errors->first('local' : '') }} --}}
                <label for="">Endereço</label><br>
                {{--Colocar tamanho para esse input--}}
                <input type="text" name="endereco" size="60" style="border-radius: 15px" value="{{old('endereco',$endereco->endereco)}}"> <br /><p>
                <button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar Alterações</button>
                {{-- <center><a href="{{ route('endsalva') }}" class="btn btn-primary" style="border-radius: 25px">Salvar</a></center> --}}
            </form>
        </div>
    </div>
  </div>
@endsection









