@extends('layouts.app')

@section('title', 'Novo Colaborador')

@section('content')



<div class="card">

    <div class="card-header">
        <h3>Novo Colaborador</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('colaboradores.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nome</label>

                <input
                    type="text"
                    name="nome"
                    class="form-control"
                    value="{{ old('nome') }}">

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
                    value="{{ old('cargo') }}">

                @error('cargo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo</label>

                <select name="tipo" class="form-select">

                    <option value="">Selecione...</option>

                    <option value="interno">Interno</option>

                    <option value="externo">Externo</option>

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
                            value="{{ $organizacao->id }}">

                            {{ $organizacao->nome }}

                        </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-success">
                Salvar
            </button>

            <a href="{{ route('colaboradores.index') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@endsection
