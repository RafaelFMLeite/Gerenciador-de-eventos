@extends('convidado.layouts.app')

@section('content')
<a href="{{ route('convidados.create') }}" class=" btn btn-primary">Adicionar Convidado</a>

<table class="table table-hover">
    <thead>
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
                    <a href="{{ route('convidados.show', $convidado) }}" class="btn btn-primary">Editar</a>

                    <form action="{{ route('convidados.destroy', $convidado) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
