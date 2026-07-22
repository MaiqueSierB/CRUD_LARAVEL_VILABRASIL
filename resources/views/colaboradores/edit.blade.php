@extends('layouts.app')

@section('title', 'Editar Colaborador')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Editar Colaborador</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('colaboradores.update', $colaborador) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">Nome</label>

                <input
                    type="text"
                    name="nome"
                    class="form-control"
                    value="{{ old('nome', $colaborador->nome) }}">

                @error('nome')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">Cargo</label>

                <input
                    type="text"
                    name="cargo"
                    class="form-control"
                    value="{{ old('cargo', $colaborador->cargo) }}">

                @error('cargo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">Tipo</label>

                <select name="tipo" class="form-select">

                    <option value="interno"
                        {{ old('tipo', $colaborador->tipo) == 'interno' ? 'selected' : '' }}>
                        Interno
                    </option>

                    <option value="externo"
                        {{ old('tipo', $colaborador->tipo) == 'externo' ? 'selected' : '' }}>
                        Externo
                    </option>

                </select>

                @error('tipo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">Organização</label>

                <select name="organizacao_id" class="form-select">

                    <option value="">Selecione...</option>

                    @foreach($organizacoes as $organizacao)

                        <option
                            value="{{ $organizacao->id }}"
                            {{ old('organizacao_id', $colaborador->organizacao_id) == $organizacao->id ? 'selected' : '' }}>

                            {{ $organizacao->nome }}

                        </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-success">
                Atualizar
            </button>

            <a href="{{ route('colaboradores.index') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@endsection
