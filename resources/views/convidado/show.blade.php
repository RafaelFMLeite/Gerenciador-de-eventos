@extends('convidado.layouts.app')
@section('title', 'Visualizar o Convidado')
@section('content')

<h1>Editando o convidado '{{ $convidado->nome }}'</h1>

<form action="{{ route('convidados.update', $convidado) }}" method="post">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email', $convidado->email) }}" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Não iremos compartilhar seu e-mail com ninguém.</div>
  </div>

  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Nome</label>
    <input type="text" class="form-control" id="exampleInputName1" name="nome" value="{{ old('nome', $convidado->nome) }}">
  </div>

  <div class="mb-3">
    <label for="exampleInputCellphone1" class="form-label">Celular</label>
    <input type="text" class="form-control" id="exampleInputCellphone1" name="celular" value="{{ old('celular', $convidado->celular) }}">
  </div>

  <button type="submit" class="btn btn-primary">Confirmar</button>
  <button action="{{ route('convidados.index') }}" class="btn btn-danger">Cancelar</button>
</form>

@endsection
