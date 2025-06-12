{{-- View principal dos endereços --}}
@extends('layouts.app')

@section('content')
<script>
    function confirmaDelete(){
        return confirm("Certeza de apagar esse registro?");
    }
</script>
    <div class="card">
        <div class="card-header h4">
            Endereços Cadastrados
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col-sm-7">ID</th>
                    <th scope="col-6">LOCAL</th>
                    <th scope="col-1">ENDEREÇO</th>
                    <th scope="col-1">AÇÃO</th>
                  </tr>
                </thead>
                <tbody>
                @csrf
            @foreach ($enderecos as $endereco)
                  <tr>
                    {{-- <th scope="row"></th> --}}
                    <td><a href="{{ route('enderecos.edit',['endereco'=>$endereco]) }}"> {{ $endereco->id }}</a></td>
                    <td>{{ $endereco->local}}</td>
                    <td>{{ $endereco->endereco }}</td>
                    <form id="form_{{$endereco->id}}" method="post" action="{{ route('enderecos.destroy', $endereco->id) }}" onsubmit="return confirmaDelete();">
                        @csrf
                        @method('DELETE')
                         <td>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true" title="apagar registro"></i></button>
                    </form>

                    </td>
                  </tr>
            {{--@empty
                Sem endereços cadastrados--}}
            @endforeach
        </tbody>
        </table>


    </div>
    <div class="card-footer">
        {{-- $enderecos->appends($request)->links() }} <br> --}}
        Exibindo {{ $enderecos->count() }} endereços de {{$enderecos->total() }} (de
        {{ $enderecos->firstItem() }} a {{ $enderecos->lastItem() }})
    </div>

    </div>


@endsection
