<?php

namespace App\Http\Controllers;
use App\Models\ItensBebida;
use App\Models\Bebida;
use App\Http\Requests\StoreItensBebidaRequest;
use App\Http\Requests\UpdateItensBebidaRequest;
use Illuminate\Http\Request;

class ItensBebidaController extends Controller
{
    public function index(){
        $itens = ItensBebida::with('bebida')->get();
        return view('itens.index', compact('itens'));
    }

    public function create(){
        $bebidas = Bebida::all();
        return view('itens.create', compact('bebidas'));
    }

    public function edit(ItensBebida $itens){
        $bebidas = Bebida::all();
        return view('itens.edit', compact('itens', 'bebidas'));
    }

    public function store(StoreItensBebidaRequest $request){
        $validatedData = $request->validated();
        ItensBebida::create($validatedData);
        return redirect()->route('itens.index')->with('success', 'Item criado com sucesso!');
    }

    public function update(UpdateItensBebidaRequest $request, ItensBebida $itens){
        $validatedData = $request->validated();
        $itens->update($validatedData);
        return redirect()->route('itens.index')->with('success', 'Item atualizado com sucesso!');
    }

    public function destroy(ItensBebida $itens){
        $itens->delete();
        return redirect()->route('itens.index')->with('success', 'Item deletado com sucesso!');
    }

}
