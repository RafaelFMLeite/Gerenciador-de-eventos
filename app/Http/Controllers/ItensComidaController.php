<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItensComida;
use App\Models\Comida;
use App\Http\Requests\StoreItensComidaRequest;
use App\Http\Requests\UpdateItensComidaRequest;

class ItensComidaController extends Controller
{
    public function index(){
        $itens = ItensComida::with('comida')->get();
        return view('itens.index', compact('itens'));
    }

    public function create(){
        $comidas = Comida::all();
        return view('itens.create', compact('comidas'));
    }

    public function edit(ItensComida $itens){
        $comidas = Comida::all();
        return view('itens.edit', compact('itens', 'comidas'));
    }

    public function store(StoreItensComidaRequest $request){
        $validatedData = $request->validated();
        ItensComida::create($validatedData);
        return redirect()->route('itens.index')->with('success', 'Item criado com sucesso!');
    }

    public function update(UpdateItensComidaRequest $request, ItensComida $itens){
        $validatedData = $request->validated();
        $itens->update($validatedData);
        return redirect()->route('itens.index')->with('success', 'Item atualizado com sucesso!');
    }

    public function destroy(ItensComida $itens){
        $itens->delete();
        return redirect()->route('itens.index')->with('success', 'Item deletado com sucesso!');
    }

    
}