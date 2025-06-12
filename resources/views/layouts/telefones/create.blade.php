{{--blade para criação de Rmais--}}
@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header h4">
            Cadastrando Ramais
        </div>
        <div class="card-body">
            <div class="mx-auto p-2" style="width: 500px;">
                <form action="{{ route('telefones.store') }}" method="post" name="formao">
                    @csrf
                    <label for="">Ramal</label><p>
                    <input type="text" name="ramaln" placeholder="9999-9999" value="{{ old('ramaln') }}" data-mask="0000-0000" data-mask-selectionfocus="true" style="border-radius: 15px"> <br /><p>
                    <label for="">Responsável</label><br>
                    <input type="text" name="responsa" value="{{ old('responsa')}}" size="40" style="border-radius: 15px"> <br /><p>
                    <label for="">Divisão</label><br>
                    <select name="divisas_id" class="form-control" style="border-radius: 15px">
                    <option value="">Selecione...</option>
                    @foreach($divisas as $divisa)
                        <option value={{ $divisa->id }}>{{ $divisa->sigla}}</option>
                    @endforeach
                    </select><p>
                    {{--inserir botão para cadastrar--}}
                    <label for="">Seção</label><br>
                    <input type="text" name="secao" size="60" value="{{ old('secao')}}" style="border-radius: 15px"> <br /><br />
                    <label for="">Endereço</label><br>
                    <select name="enderecos_id" class="form-control" style="border-radius: 15px">
                        <option value="">Selecione...</option>
                    @foreach($enderecos as $endereco)
                        <option value={{ $endereco->id }}>{{ $endereco->local}}</option>
                    @endforeach
                    </select></p>
               {{--colocar o endereço por vue --}}
                    <button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection









