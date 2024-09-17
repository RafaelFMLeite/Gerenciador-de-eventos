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
                            <th scope="col">Email</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($convidados as $convidado)
                            <tr>
                                <th scope="row">{{ $convidado->id }}</th>
                                <td>{{ $convidado->nome }}</td>
                                <td>{{ $convidado->email }}</td>
                                <td>
                                    <a href="{{ route('convidados.show', $convidado) }}" class="btn btn-warning btn-sm">Editar</a>

                                    <form action="{{ route('convidados.destroy', $convidado) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este convidado?')">Excluir</button>
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
