@extends('layouts.app')

@section('title', 'Organizações')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>Organizações</h1>

    <a href="{{ route('organizacoes.create') }}" class="btn btn-primary">
        Nova Organização
    </a>

</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped table-hover">

    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th width="180">Ações</th>
        </tr>

    </thead>

    <tbody>

        @forelse($organizacoes as $organizacao)

            <tr>

                <td>{{ $organizacao->id }}</td>

                <td>{{ $organizacao->nome }}</td>

                <td>

                    <a href="{{ route('organizacoes.edit', $organizacao) }}"
                       class="btn btn-warning btn-sm">

                        Editar

                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="3" class="text-center">

                    Nenhuma organização cadastrada.

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection
