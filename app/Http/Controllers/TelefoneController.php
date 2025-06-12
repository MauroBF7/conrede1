<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTelefoneRequest;
use App\Http\Requests\UpdateTelefoneRequest;
use App\Http\Requests\DivisaController;
use Illuminate\Http\Request;
use App\Models\Telefone;
use App\Models\Divisa;
use App\Models\Endereco;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use App\Mail\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestEmail;
use PDF;

class TelefoneController extends Controller
{
    /**Teste de envio de email por envelope */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ati.prip@usp.br','Informática PRIP'),
            subject: 'Order Shipped',
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('user');
        $telefones= Telefone::orderBy('ramaln','ASC')->get();
        $divisas= Divisa::all();
        $enderecos= Endereco::all();
        return view('layouts.telefones.index',['telefones'=>$telefones, 'divisas'=>$divisas, 'enderecos'=>$enderecos, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('manager');
        $divisas= Divisa::all();
        $enderecos= Endereco::all();
        return view('layouts.nips.create',['divisas'=>$divisas, 'enderecos'=>$enderecos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->authorize('manager');
        $request->validate([
            'ramaln'=>'required|min:9|max:9|unique:telefones',
            'divisas_id'=>'required',
            'enderecos_id'=>'required'
        ],[
            'required'=>'O campo :attribute é de preenchimento obrigatório',
            'unique'=>'Este ramal já está cadastrado',
            'min'=>'Formato incorreto, quantidade de caracteres muito pequena, campo :attribute',
            'max'=>'Formato incorreto, quantidade de caracteres muito grande, campo :attribute'
        ]);

        $telefone = Telefone::create([
            'ramaln' => $request->ramaln,
            'responsa' => $request->responsa,
            'divisas_id'=>$request->divisas_id,
            'secao'=>$request->secao,
            'enderecos_id'=>$request->enderecos_id,
        ]);

        $request->session()->flash('alert-success', 'Ramal cadastrado');
        //Desviar para criar outro ou para mostrar os cadastrados
        return redirect()->route('telefones.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Telefone $telefone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Telefone $telefone)
    {
        $this->authorize('manager');
        $divisas= Divisa::all();
        $enderecos= Endereco::all();
        return view('layouts.telefones.edit',['telefone'=>$telefone, 'divisas'=>$divisas, 'enderecos'=>$enderecos]);
    }

    //**Função para solicitação de troca de ramais - por email */
    public function troca(Telefone $telefone)
    {
        $this->authorize('user');
        $divisas= Divisa::all();
        $enderecos= Endereco::all();
        //aqui colocar a view do envia email
        //echo "estou aqui";
        //dd($telefone);
        return view('layouts.telefones.mensagem',['telefone'=>$telefone, 'divisas'=>$divisas, 'enderecos'=>$enderecos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTelefoneRequest $request, Telefone $telefone)
    {
        $this->authorize('manager');
        $request->validate([]);
        $telefone= Telefone::find($request->input('id'));
        $telefone->update($request->all());
        $request->session()->flash('alert-success', 'Ramal alterado!');
        //Desviar para criar outro ou para mostrar os cadastrados
        return redirect()->route('telefones.index');
    }

    /**
     * Function para envio de emails
     */
    public function envio(Request $request, Telefone $telefone)
    {

        $this->authorize('user');
        $responsa= $request;
        //dd($divisao);
        $name= "Aplicativo Ramais PRIP";
        Mail::to("ati.prip@usp.br")->send(new MyTestEmail($name,$responsa));
        $request->session()->flash('alert-success', 'Solicitação de alterações de informações encaminhada!');
        return redirect()->route('telefones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Telefone $telefone)
    {
        //dd($telefone);
        $this->authorize('manager');
        $telefone->delete();
        $request->session()->flash('alert-success', 'Ramal apagado!');
        return redirect()->route('telefones.index');
    }

    /*** Função para exportação da lista de telefones como PDF */
    public function exportacao(){
        $this->authorize('user');
        $telefones= Telefone::orderBy('ramaln','ASC')->get();
        $divisas= Divisa::all();
        $enderecos= Endereco::all();
        setlocale(LC_ALL,'pt_BR.utf-8','pt_BR','Portuguese_Brazil');
        $pdf = PDF::loadView('layouts.telefones.pdf',['telefones'=>$telefones, 'divisas'=>$divisas, 'enderecos'=>$enderecos]);
        $pdf->render();
        return $pdf->stream('ListaRamais.pdf'); //no navegador
    }

    /*** Função teste */
    public function testao(){
        $telefones= Telefone::all();
        $divisas= Divisa::all();
        $enderecos= Endereco::all();
        //echo "Chegada no testao";
        return view('layouts.telefones.create1',['divisas'=>$divisas, 'enderecos'=>$enderecos]);
    }


}
