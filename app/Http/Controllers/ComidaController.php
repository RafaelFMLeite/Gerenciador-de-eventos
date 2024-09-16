<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreComidaRequest; // Correção no namespace
use App\Models\Comida;

class ComidaController extends Controller
{
    public function index()
    {
        $comidas = Comida::paginate();
        return view('comida.index', compact('comidas'));
    }

    public function create()
    {
        return view('comida.create');
    }

    public function edit(Comida $comida) // Adicionado tipo de injeção de dependência
    {
        return view('comida.edit', compact('comida'));
    }

    public function store(StoreComidaRequest $request) // Correção na capitalização
    {
        $validatedData = $request->validated();
        $comida = Comida::create($validatedData);
        return redirect()->route('comida.index')->with('success', 'Comida criada com sucesso!');
    }

    public function show(Comida $comida) // Adicionado tipo de injeção de dependência
    {
        return view('comida.show', compact('comida'));
    }

    public function update(StoreComidaRequest $request, Comida $comida) // Adicionado tipo de injeção de dependência e correção na capitalização
    {
        $validatedData = $request->validated();
        $comida->update($validatedData);
        return redirect()->route('comida.index')->with('success', 'Comida atualizada com sucesso!');
    }

    public function destroy(Comida $comida)
    {
        if ($comida->usuario_id !== auth()->id()) {
            return redirect()->route('comida.index')->with('error', 'Não autorizado a deletar esta comida.');
        }
        
        $comida->delete();
        return redirect()->route('comida.index')->with('success', 'Comida deletada com sucesso!');
    }
}
