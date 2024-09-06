<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convidado;
use App\Http\Requests\StoreConvidadoRequest;
use App\Http\Requests\UpdateConvidadoRequest;

class ConvidadoController extends Controller
{
    public function index()
    {
        $convidados = Convidado::where('usuario_id', auth()->id())->get();
        return view('convidado.index', compact('convidados'));
    }
    

    public function create()
    {
        return view('convidado.create');
    }

    public function edit(Convidado $convidado)
    {
        if ($convidado->usuario_id !== auth()->id()) {
            return redirect()->route('convidados.index')->with('error', 'Convidado não encontrado!');
        }
        return view('convidado.edit', compact('convidado'));
    }

    public function store(StoreConvidadoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['usuario_id'] = auth()->id();
        $convidado = Convidado::create($validatedData);

        return redirect()->route('convidados.index')->with('success', 'Convidado criado com sucesso!');
    }
    
    public function show(Convidado $convidado)
    {
        return view('convidado.show', compact('convidado'));
    }

    public function update(UpdateConvidadoRequest $request, Convidado $convidado)
    {
        if ($convidado->usuario_id !== auth()->id()) {
            return redirect()->route('convidados.index')->with('error', 'Convidado não encontrado!');
        }

        $validatedData = $request->validated();
        $convidado->update($validatedData);

        return redirect()->route('convidados.index')->with('success', 'Convidado atualizado com sucesso!');
    }

    public function destroy(Convidado $convidado)
    {
        if ($convidado->usuario_id !== auth()->id()) {
            return redirect()->route('convidados.index')->with('error', 'Convidado não encontrado!');
        }

        $convidado = Convidado::destroy($convidado->id);

        return redirect()->route('convidados.index')->with('success', 'Convidado excluído com sucesso!');
    }
}
