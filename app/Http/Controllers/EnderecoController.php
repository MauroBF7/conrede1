<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $enderecos= Endereco::paginate(50);
        return view('layouts.enderecos.index',['enderecos'=>$enderecos, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('senhaunica.servidor');
        return view('layouts.enderecos.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([]);
        $endereco = Endereco::create([
            'local' => $request->local,
            'endereco' => $request->endereco,
        ]);
        $request->session()->flash('alert-success', 'Endereço cadastrado');
        //Desviar para criar outro ou para mostrar os cadastrados
        return redirect()->route('enderecos.create');
    }
/**
     * Store a JavaScript
     */
    public function storeModal(Request $request)
    {
        //dd($request);
        $request->validate([]);
        $endereco = Endereco::create([
            'local' => $request->local,
            'endereco' => $request->endereco,
        ]);
        $request->session()->flash('alert-success', 'Endereço cadastrado');
        //Desviar para criar outro ou para mostrar os cadastrados
        return redirect()->route('telefones.create')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Endereco $endereco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Endereco $endereco)
    {

        return view('layouts.enderecos.edit',['endereco'=>$endereco]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Endereco $endereco)
    {
        //echo "Cheguei<br>";
        //dd($request);
        $request->validate([]);
        $endereco= Endereco::find($request->input('id'));
        $endereco->update($request->all());
        $request->session()->flash('alert-success', 'Endereço alterado!');
        //Desviar para criar outro ou para mostrar os cadastrados
        return redirect()->route('enderecos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Endereco $endereco)
    {
        //dd($endereco);
        $endereco->delete();
        $request->session()->flash('alert-success', 'Endereço apagado!');
        return redirect()->route('enderecos.index');
    }
}
