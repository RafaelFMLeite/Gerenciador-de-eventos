@extends('convidado.layouts.app')

@section('content')

<form action="{{ route('convidados.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label for="celular" class="form-label">Celular</label>
        <input type="text" class="form-control" name="celular" id="celular" value="{{ old('celular') }}">
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
@endsection