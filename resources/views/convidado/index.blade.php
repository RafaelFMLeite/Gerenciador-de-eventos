@extends('convidado.layouts.app')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Lista de Convidados</h2>
        <a href="{{ route('convidados.create') }}" class="btn btn-success">Adicionar Convidado</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($convidados->isEmpty())
                <p class="text-center">Nenhum convidado cadastrado ainda.</p>
            @else
                <table class="table table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Quantidade KG</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comidas as $comida)
                            <tr>
                                <th scope="row">{{ $comida->id }}</th>
                                <td>{{ $comida->nome }}</td>
                                <td>{{ $comida->quantidade }}</td>
                                <td>
                                    <a href="{{ route('comidas.show', $comida) }}" class="btn btn-warning btn-sm">Editar</a>

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
