<?php

namespace App\Http\Controllers;
use App\Models\Bebida;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBebidaRequest;
use App\Http\Requests\UpdateBebidaRequest;

class BebidaController extends Controller
{
    public function index(){
        $bebidas = Bebida::all();
        return view('bebida.index', compact('bebidas'));
    }

    public function create(){
        return view('bebida.create');
    }

    public function edit(Bebida $bebida){
        return view('bebida.edit', compact('bebida'));
    }

    public function show(Bebida $bebida){
        return view('bebida.show', compact('bebida'));
    }

    public function store(StoreBebidaRequest $request){
        $validatedData = $request->validated();
        Bebida::create($validatedData);
        return redirect()->route('bebida.index')->with('success', 'Bebida criada com sucesso!');
    }

    public function update(UpdateBebidaRequest $request, Bebida $bebida){
        $validatedData = $request->validated();
        $bebida->update($validatedData);
        return redirect()->route('bebida.index')->with('success', 'Bebida atualizada com sucesso!');
    }

    public function destroy(Bebida $bebida){
        $bebida->delete();
        return redirect()->route('bebida.index')->with('success', 'Bebida deletada com sucesso!');
    }


}
