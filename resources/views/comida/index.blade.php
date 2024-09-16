@extends('comida.layouts.app')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Lista de Comidas</h2>
        <a href="{{ route('comidas.create') }}" class="btn btn-success">Adicionar Comida</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($comidas->isEmpty())
                <p class="text-center">Nenhuma comida foi cadastrada ainda.</p>
            @else
                <table class="table table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comidas as $comida)
                            <tr>
                                <th scope="row">{{ $comida->id }}</th>
                                <td>{{ $comida->nome }}</td>
                                <td>{{ $comida->descricao }}</td>
                                <td>
                                    <a href="{{ route('comidas.edit', $comida) }}" class="btn btn-warning btn-sm">Editar</a>

                                    <form action="{{ route('comidas.destroy', $comida) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta comida?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

@endsection
