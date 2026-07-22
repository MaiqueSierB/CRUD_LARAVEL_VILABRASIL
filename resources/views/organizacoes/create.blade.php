@extends('layouts.app')

@section('title', 'Nova Organização')

@section('content')

<h1 class="mb-4">Nova Organização</h1>

<form action="{{ route('organizacoes.store') }}" method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">Nome</label>

        <input
            type="text"
            name="nome"
            class="form-control"
            required>

    </div>

    <button class="btn btn-success">
        Salvar
    </button>

    <a href="{{ route('organizacoes.index') }}"
       class="btn btn-secondary">

        Voltar

    </a>

</form>

@endsection
