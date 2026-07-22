@extends('layouts.app')

@section('title', 'Editar Organização')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Editar Organização</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('organizacoes.update', $organizacao) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">Nome</label>

                <input
                    type="text"
                    name="nome"
                    class="form-control"
                    value="{{ old('nome', $organizacao->nome) }}">

                @error('nome')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button class="btn btn-success">
                Atualizar
            </button>

            <a href="{{ route('organizacoes.index') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@endsection
