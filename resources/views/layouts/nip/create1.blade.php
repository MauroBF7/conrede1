{{--blade para teste--}}
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
                    {{--inserir botão para cadastrar--}}
                    <label for="">Seção</label><br>
                    <input type="text" name="secao" size="60" style="border-radius: 15px"> <br /><br />
                    <label for="">Endereço</label><br>
                    <select name="enderecos_id" id="enderecos_id" style="border-radius: 15px">
                    @foreach($enderecos as $endereco)
                        <option value={{ $endereco->id }}>{{ $endereco->local}}</option>
                    @endforeach
                    <option value="cadastrar">Cadastrar...</option></select><br><br>
                    <label for="">Local:</label><br>
                    <input type="text" id="local" name="local" style="border-radius: 15px"> <br /><p>
                    <label for="" aria-hidden="true">Endereço</label><br>
                    <input type="text" name="endereco" size="45" style="border-radius: 15px" aria-hidden="true"> <br /><p>
                    <br /><p>
                        <div id="app">
                            <input type="text" v-model="input1" placeholder="Input 1"/>
                            <input type="text" v-show="input1=== 'alpha'" v-model="input2" placeholder="Input 2"/>
                        </div>
                    <button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar</button>
                </form>
            </div>
        </div>
    </div>

<!-- JavaScript to handle the select change -->
<script>
   // document.getElementById('enderecos_id').addEventListener('change', function() {
   //     if (this.value === 'cadastrar') {
   //         $('#cadastrarModal').modal('show');
   //     }
   // });
   function showInput(value){
     if (value=="cadastrar"){
            document.getElementById('local').classList.remove('hidden')
        }else{
            document.getElementById('local').classList.add('hidden')
        }
    }
    new Vue({
        el: "#app",
        data: {
            input1: null,
            input2: null
        }
    })

</script>



@endsection









