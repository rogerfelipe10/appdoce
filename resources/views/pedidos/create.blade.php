@extends('layout')

@section('conteudo')
    <h1>Novo pedido</h1>
    <form method="POST" action="{{ route('pedidos.store') }}" novalidate data-cy="form-pedido">
        @csrf
        <label for="cliente_id">Cliente</label>
        <select id="cliente_id" name="cliente_id" data-cy="campo-cliente">
            <option value="">Selecione</option>
            @foreach ($clientes as $c)
                <option value="{{ $c->id }}" @selected(old('cliente_id') == $c->id)>{{ $c->nome }}</option>
            @endforeach
        </select>
        @error('cliente_id') <span class="erro" data-cy="erro-cliente">{{ $message }}</span> @enderror

        <label for="produto_id">Produto</label>
        <select id="produto_id" name="produto_id" data-cy="campo-produto">
            <option value="">Selecione</option>
            @foreach ($produtos as $p)
                <option value="{{ $p->id }}" @selected(old('produto_id') == $p->id)>{{ $p->nome }} (estoque {{ $p->estoque }})</option>
            @endforeach
        </select>
        @error('produto_id') <span class="erro" data-cy="erro-produto">{{ $message }}</span> @enderror

        <label for="quantidade">Quantidade</label>
        <input id="quantidade" name="quantidade" type="number" data-cy="campo-quantidade" value="{{ old('quantidade', 1) }}">
        @error('quantidade') <span class="erro" data-cy="erro-quantidade">{{ $message }}</span> @enderror

        <p><button class="btn" data-cy="salvar-pedido">Registrar pedido</button></p>
    </form>
@endsection
