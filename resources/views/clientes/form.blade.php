@extends('layout')

@section('conteudo')
    <h1>{{ $cliente->exists ? 'Editar cliente' : 'Novo cliente' }}</h1>
    <form method="POST" novalidate data-cy="form-cliente"
          action="{{ $cliente->exists ? route('clientes.update', $cliente) : route('clientes.store') }}">
        @csrf
        @if ($cliente->exists) @method('PUT') @endif

        <label for="nome">Nome</label>
        <input id="nome" name="nome" data-cy="campo-nome" value="{{ old('nome', $cliente->nome) }}">
        @error('nome') <span class="erro" data-cy="erro-nome">{{ $message }}</span> @enderror

        <label for="contato">Contato</label>
        <input id="contato" name="contato" data-cy="campo-contato" value="{{ old('contato', $cliente->contato) }}">
        @error('contato') <span class="erro" data-cy="erro-contato">{{ $message }}</span> @enderror

        <label for="endereco">Endereço</label>
        <input id="endereco" name="endereco" data-cy="campo-endereco" value="{{ old('endereco', $cliente->endereco) }}">
        @error('endereco') <span class="erro" data-cy="erro-endereco">{{ $message }}</span> @enderror

        <p><button class="btn" data-cy="salvar-cliente">Salvar</button>
            <a class="btn btn-sec" href="{{ route('clientes.index') }}">Cancelar</a></p>
    </form>
@endsection
