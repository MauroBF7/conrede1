{{--blade para criação de IPs--}}
@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header h4">
            Cadastrando Informações dos IPs
        </div>
        <div class="card-body">
            <div class="mx-auto p-2" style="width: 500px;">
                <form action="{{ route('nip.store') }}" method="post">
                    @csrf
                    <label for="">IP</label><p>
                    <input type="text" name="ip" style="border-radius: 15px"> <br /><p>
                    <label for="">Patch Panel</label><br>
                    <input type="text" name="pathpanel" size="04" style="border-radius: 15px"> <br /><p>
                    <label for="">Porta Patch</label><br>
                    <input type="text" name="porta" size="04" style="border-radius: 15px"> <br /><p>
                    <label for="">Porta Switch</label><br>
                    <input type="text" name="psw" size="03" style="border-radius: 15px"> <br /><p>
                    <label for="">Patrimônio</label><br>
                    <input type="text" name="patrimonio" size="11" style="border-radius: 15px"> <br /><p>
                    <label for="">Responsável</label><br>
                    <input type="text" name="responsa" size="45" style="border-radius: 15px"> <br /><p>
                    <label for="">Divisão</label><br>
                    <select name="divisas_id" class="form-control" style="border-radius: 15px">
                    @foreach($divisas as $divisa)
                        <option value={{ $divisa->id }}>{{ $divisa->sigla}}</option>
                    @endforeach
                    <option value="outro">Não listado</option></select><br><br>
                    {{--inserir botão para cadastrar--}}
                    <label for="">Seção</label><br>
                    <input type="text" name="secao" size="60" style="border-radius: 15px"> <br /><br />
                    <br /><p>
                    <button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to handle the select change -->
<script>

</script>



@endsection









