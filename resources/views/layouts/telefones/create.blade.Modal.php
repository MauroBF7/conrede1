{{--blade para criação de Rmais--}}
@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header h4">
            Cadastrando Ramais
        </div>
        <div class="card-body">
            <div class="mx-auto p-2" style="width: 500px;">
                <form action="{{ route('telefones.store') }}" method="post">
                    @csrf
                    <label for="">Ramal</label><p>
                    <input type="text" name="ramaln" style="border-radius: 15px"> <br /><p>
                    <label for="">Responsável</label><br>
                    <input type="text" name="responsa" size="40" style="border-radius: 15px"> <br /><p>
                    <label for="">Divisão</label><br>
                    <select name="divisas_id" class="form-control" style="border-radius: 15px">
                    @foreach($divisas as $divisa)
                        <option value={{ $divisa->id }}>{{ $divisa->sigla}}</option>
                    @endforeach
                    <option value="outro">Não listado</option></select><br><br>
                    {{--inserir botão para cadastrar--}}
                    <label for="">Seção</label><br>
                    <input type="text" name="secao" size="60" style="border-radius: 15px"> <br /><br />
                    <label for="">Endereço</label><br>
                    <select name="enderecos_id" id="enderecos_id" style="border-radius: 15px">
                    @foreach($enderecos as $endereco)
                        <option value={{ $endereco->id }}>{{ $endereco->local}}</option>
                    @endforeach
                    <option value="cadastrar">Cadastrar...</option></select><br><br>
                    {{--colocar o endereço por vue --}}
                    <br /><p>
                    <button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar</button>
                </form>
            </div>
        </div>
    </div>
<!-- Cadastrar endereço via modal -->
<div class="modal fade" id="cadastrarModal" tabindex="-1" role="dialog" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="cadastrarModalLabel">Cadastrar Endereço</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Parte da view que cadastra endereço -->
                {{--blade para criação de Endereços--}}
                <div class="card">
                    <div class="card-header h4">
                    +Cadastrando Endereços
                    </div>
                    <form action="{{ route('enderecos.store') }}" id="formEndereco" method="post">
                    <div class="card-body">
                        <div class="mx-auto p-2" style="width: 500px;">
                                @csrf
                                @method('POST')
                                <label for="">Local</label><p>
                                <input type="text" name="local" style="border-radius: 15px"> <br /><p>
                                <label for="">Endereço</label><br>
                                <input type="text" name="endereco" size="45" style="border-radius: 15px"> <br /><p>

                                {{-- <center><a href="{{ route('endsalva') }}" class="btn btn-primary" style="border-radius: 25px">Salvar</a></center> --}}
                            </form>
                        </div>
                    </div>
                </div>
                <!--Fim cadastro endereço -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 25px">Fechar</button>
                <button type="submit" class="btn btn-primary" style="border-radius: 25px" onclick="document.getElementById('formEndereco').submit();">Salvar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- JavaScript to handle the select change -->
<script>
    document.getElementById('enderecos_id').addEventListener('change', function() {
        if (this.value === 'cadastrar') {
            $('#cadastrarModal').modal('show');
        }
    });
</script>



@endsection









