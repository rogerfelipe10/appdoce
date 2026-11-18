@extends('layout')

@section('conteudo')
    <h1>{{ $produto->exists ? 'Editar produto' : 'Novo produto' }}</h1>
    <form method="POST" novalidate data-cy="form-produto"
          action="{{ $produto->exists ? route('produtos.update', $produto) : route('produtos.store') }}">
        @csrf
        @if ($produto->exists) @method('PUT') @endif

        <label for="nome">Nome</label>
        <input id="nome" name="nome" data-cy="campo-nome" value="{{ old('nome', $produto->nome) }}">
        @error('nome') <span class="erro" data-cy="erro-nome">{{ $message }}</span> @enderror

        <label for="categoria">Categoria</label>
        <select id="categoria" name="categoria" data-cy="campo-categoria">
            <option value="">Selecione</option>
            @foreach (\App\Models\Produto::CATEGORIAS as $c)
                <option value="{{ $c }}" @selected(old('categoria', $produto->categoria) === $c)>{{ $c }}</option>
            @endforeach
        </select>
        @error('categoria') <span class="erro" data-cy="erro-categoria">{{ $message }}</span> @enderror

        <label for="preco">Preço</label>
        <input id="preco" name="preco" type="number" step="0.01" data-cy="campo-preco" value="{{ old('preco', $produto->preco) }}">
        @error('preco') <span class="erro" data-cy="erro-preco">{{ $message }}</span> @enderror

        <label for="estoque">Estoque</label>
        <input id="estoque" name="estoque" type="number" data-cy="campo-estoque" value="{{ old('estoque', $produto->estoque) }}">
        @error('estoque') <span class="erro" data-cy="erro-estoque">{{ $message }}</span> @enderror

        <label for="estoque_minimo">Estoque mínimo</label>
        <input id="estoque_minimo" name="estoque_minimo" type="number" data-cy="campo-estoque-minimo" value="{{ old('estoque_minimo', $produto->estoque_minimo) }}">
        @error('estoque_minimo') <span class="erro" data-cy="erro-estoque-minimo">{{ $message }}</span> @enderror

        <p><button class="btn" data-cy="salvar-produto">Salvar</button>
            <a class="btn btn-sec" href="{{ route('produtos.index') }}">Cancelar</a></p>
    </form>
@endsection
