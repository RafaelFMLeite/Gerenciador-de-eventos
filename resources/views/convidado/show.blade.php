@extends('convidado.layouts.app')
@section('title', 'Editar Convidado')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Editando o Convidado: '{{ $convidado->nome }}'</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('convidados.update', $convidado) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email', $convidado->email) }}" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Não iremos compartilhar seu e-mail com ninguém.</div>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Nome</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="exampleInputName1" name="nome" value="{{ old('nome', $convidado->nome) }}" required>
                            @error('nome')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputCellphone1" class="form-label">Celular</label>
                            <input type="text" class="form-control @error('celular') is-invalid @enderror" id="exampleInputCellphone1" name="celular" value="{{ old('celular', $convidado->celular) }}" required>
                            @error('celular')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Salvar Alterações</button>
                            <a href="{{ route('convidados.index') }}" class="btn btn-secondary btn-lg">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
