<?php

namespace App\Http\Controllers;

use App\Models\Divisa;
use Illuminate\Http\Request;

class DivisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $divisas= Divisa::paginate(50);
        return view('layouts.divisas.index',['divisas'=>$divisas, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('senhaunica.servidor');
        return view('layouts.divisas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        //$request->validated();
        $request->validate([
            'sigla'=>'required|unique:divisas',
            'descricao'=>'required|max:80'],
        [   'unique'=>'Divisão já cadastrada',
            'required'=>'Este campo é obrigatório',
            'max'=>'Quantidade máxima é de 80 caracteres'
    ]);
        $divisa = Divisa::create([
            'sigla' => $request->sigla,
            'descricao' => $request->descricao,
        ]);
        $request->session()->flash('alert-success', 'Divisão/Serviço cadastrado');
        //Desviar para criar outro ou para mostrar os cadastrados
        return redirect()->route('divisas.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Divisa $divisa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisa $divisa)
    {
        return view('layouts.divisas.edit',['divisa'=>$divisa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divisa $divisa)
    {
        $request->validate([]);
        $divisa= Divisa::find($request->input('id'));
        $divisa->update($request->all());
        $request->session()->flash('alert-success', 'Divisão/Serviço alterado!');
        //Desviar para criar outro ou para mostrar os cadastrados
        return redirect()->route('divisas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Divisa $divisa)
    {
        $divisa->delete();
        $request->session()->flash('alert-success', 'Divisão/Serviço apagado!');
        return redirect()->route('divisas.index');
    }
}
