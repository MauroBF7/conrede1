{{-- View principal dos Divisões --}}
@extends('layouts.app')

@section('content')
<script>
    function confirmaDelete(){
        return confirm("Certeza de apagar esse registro?");
    }
</script>
    <div class="card">
        <div class="card-header h4">
            Divisões/Serivços Cadastrados
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col-sm-7">ID</th>
                    <th scope="col-6">SIGLA</th>
                    <th scope="col-1">DESCRIÇÃO</th>
                    @can('manager')<th scope="col-1">AÇÃO</th>@endcan
                  </tr>
                </thead>
                <tbody>
                @csrf
            @foreach ($divisas as $divisa)
                  <tr>
                    {{-- <th scope="row"></th> --}}
                    <td><a href="{{ route('divisas.edit',['divisa'=>$divisa]) }}"> {{ $divisa->id }}</a></td>
                    <td>{{ $divisa->sigla}}</td>
                    <td>{{ $divisa->descricao }}</td>
                    <form id="form_{{$divisa->id}}" method="post" action="{{ route('divisas.destroy', $divisa->id) }}" onsubmit="return confirmaDelete();">
                        @csrf
                        @method('DELETE')
                         <td>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true" title="apagar registro"></i></button>
                    </form>

                    </td>
                  </tr>
            {{--@empty
                Sem divisões cadastradas--}}
            @endforeach
        </tbody>
        </table>


    </div>
    <div class="card-footer">
        {{-- $divisas->appends($request)->links() }} <br> --}}
        Exibindo {{ $divisas->count() }} divisões de {{$divisas->total() }} (de
        {{ $divisas->firstItem() }} a {{ $divisas->lastItem() }})
    </div>

    </div>


@endsection
