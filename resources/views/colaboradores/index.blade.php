@extends('layouts.app')

@section('title', 'Colaboradores')

@section('content')



<div class="row mb-4">

  <h1 class="mb-3">Colaboradores</h1>

<a href="{{ route('colaboradores.create') }}"
   class="btn btn-primary mb-4">
    Novo Colaborador
</a>
<form method="GET"
      action="{{ route('colaboradores.index') }}"
      class="mb-3">

    <div class="input-group">

        <input
            type="text"
            name="pesquisa"
            class="form-control"
            placeholder="Pesquisar por nome, cargo ou organização..."
            value="{{ $pesquisa }}">

        <button class="btn btn-primary">

            Buscar

        </button>

        <a href="{{ route('colaboradores.index') }}"
           class="btn btn-secondary">

            Limpar

        </a>

    </div>

</form>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="table-responsive">


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

    <form
        action="{{ route('colaboradores.destroy', $colaborador) }}"
        method="POST"
        class="d-inline">

        @csrf
        @method('DELETE')

        <button
            class="btn btn-danger btn-sm"
            onclick="return confirm('Deseja realmente excluir este colaborador?')">

            Excluir

        </button>

    </form>

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
</div>
@endsection
