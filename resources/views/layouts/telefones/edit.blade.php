{{--blade para edição de registros de Telefones--}}
@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header h4">

      Editando a Telefone, registro nº {{$telefone->id}}
    </div>
    <div class="card-body">
        <div class="mx-auto p-2" style="width: 500px;">
            <form action="{{ route('telefones.update',['telefone'=>$telefone]) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $telefone->id }}">
                <label for="">Ramal</label><p>
                <input type="text" name="ramaln" style="border-radius: 15px" value="{{old('ramaln',$telefone->ramaln)}}"> <br /><p>
               {{-- {{ $errors->has('ramaln') ? $errors->first('ramaln' : '') }} --}}
                <label for="">Responsável</label><br>
                {{--Colocar tamanho para esse input--}}
                <input type="text" name="responsa" size="45" style="border-radius: 15px" value="{{old('responsa',$telefone->responsa)}}"> <br /><p>
                <label for="">Divisão</label><br>
               {{-- <input type="text" name="divisas_id" style="border-radius: 15px" value="{{old('divisas_id',$telefone->divisas_id)}}"> <br /><p> --}}
                <select name="divisas_id" style="border-radius: 15px">
                <option value="">Selecione Div</option>
                @forelse($divisas as $divisa)
                    <option value="{{$divisa->id}}"
                        {{ $telefone->divisas_id == $divisa->id ? 'selected':''}}>
                        {{ $divisa->sigla }}</option>
                {{--@endforeach --}}
                @empty
                    <option value=" ">Sem divisão encontrada</option>
                @endforelse
                </select><br><br>
                <label for="">Seção</label><br>
                <input type="text" name="secao" style="border-radius: 15px" value="{{old('secao',$telefone->secao)}}"> <br /><p>
                <label for="">Local</label><br>
               {{-- <input type="text" name="enderecos_id" style="border-radius: 15px" value="{{old('enderecos_id', $telefone->enderecos_id)}}"> <br /><p> --}}
                <select name="enderecos_id" style="border-radius: 15px">
                    {{-- <option value="">Selecione Local</option> --}}
                        @forelse($enderecos as $endereco)
                            <option value="{{$endereco->id}}"
                            {{ ($endereco->id==old('enderecos_id')|| ($telefone->enderecos_id == $endereco->id) ) ? 'selected':''}}>
                            {{ $endereco->local }}
                            {{--@endforeach --}}
                        @empty
                            <option value=" ">Sem local encontrado
                        @endforelse
                    </option><br>
                </select><br><br>
                <button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar Alterações</button>
                {{-- <center><a href="{{ route('salvadivisa') }}" class="btn btn-primary" style="border-radius: 25px">Salvar</a></center> --}}
            </form>
        </div>
    </div>
  </div>
@endsection









