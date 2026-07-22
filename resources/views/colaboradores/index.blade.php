@extends('layouts.app')

@section('title', 'Colaboradores')

@section('content')

<h1 class="mb-4">
    Colaboradores
</h1>

<a href="{{ route('colaboradores.create') }}"
   class="btn btn-primary mb-3">

    Novo Colaborador

</a>

<table class="table table-striped table-hover">

    <thead class="table-dark">

    <tr>

        <th>Nome</th>
        <th>Cargo</th>
        <th>Tipo</th>
        <th>Organização</th>
        <th width="150">Ações</th>

    </tr>

    </thead>

    <tbody>

    @forelse($colaboradores as $colaborador)

        <tr>

            <td>{{ $colaborador->nome }}</td>

            <td>{{ $colaborador->cargo }}</td>

            <td>{{ ucfirst($colaborador->tipo) }}</td>

            <td>{{ $colaborador->organizacao->nome ?? '-' }}</td>

            <td>

                <a
                    href="{{ route('colaboradores.edit', $colaborador) }}"
                    class="btn btn-warning btn-sm">

                    Editar

                </a>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="5" class="text-center">

                Nenhum colaborador cadastrado.

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

@endsection
