<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Requests\StoreLocalRequest;
use App\Requests\UpdateLocalRequest;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index(){
        $local = Local::all();
        return view('local.index', compact('local'));
    }

    public function create(){
        return view('local.create', compact('local'));
    }

    public function update(UpdateLocalRequest $request, Local $local){
        $validatedData = $request->validated();
        $local->update($validatedData);
        return redirect()->route('local.index')->with('success', 'Local atualizado com sucesso!');
    }

    public function store(StoreLocalRequest $request){
        $validatedData = $request->validated();
        $local = Local::create($validatedData);
        return redirect()->route('local.index')->with('success', 'Local criado com sucesso!');
    }

    public function destroy(Local $local){
        $local->delete();
        return redirect()->route('local.index')->with('success', 'Local deletado com sucesso!');
    }

    public function edit(Local $local){
        return view('local.edit', compact('local'));
    }

    public function show(Local $local){
        return view('local.show', compact('local'));
    }

    
}
