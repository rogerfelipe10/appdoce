@extends('layout')

@section('conteudo')
    <h1>{{ $frete->exists ? 'Editar frete' : 'Novo frete' }}</h1>
    <form method="POST" novalidate data-cy="form-frete"
          action="{{ $frete->exists ? route('fretes.update', $frete) : route('fretes.store') }}">
        @csrf
        @if ($frete->exists) @method('PUT') @endif

        <label for="pedido_id">Pedido</label>
        <select id="pedido_id" name="pedido_id" data-cy="campo-pedido">
            <option value="">Selecione</option>
            @foreach ($pedidos as $p)
                <option value="{{ $p->id }}" @selected(old('pedido_id', $frete->pedido_id) == $p->id)>#{{ $p->id }} - {{ $p->cliente->nome }}</option>
            @endforeach
        </select>
        @error('pedido_id') <span class="erro" data-cy="erro-pedido">{{ $message }}</span> @enderror

        <label for="endereco">Endereço</label>
        <input id="endereco" name="endereco" data-cy="campo-endereco" value="{{ old('endereco', $frete->endereco) }}">
        @error('endereco') <span class="erro" data-cy="erro-endereco">{{ $message }}</span> @enderror

        <label for="taxa">Taxa</label>
        <input id="taxa" name="taxa" type="number" step="0.01" data-cy="campo-taxa" value="{{ old('taxa', $frete->taxa) }}">
        @error('taxa') <span class="erro" data-cy="erro-taxa">{{ $message }}</span> @enderror

        <label for="data_prevista">Data prevista</label>
        <input id="data_prevista" name="data_prevista" type="date" data-cy="campo-data-prevista" value="{{ old('data_prevista', $frete->data_prevista?->format('Y-m-d')) }}">
        @error('data_prevista') <span class="erro" data-cy="erro-data-prevista">{{ $message }}</span> @enderror

        <label for="rastreio">Rastreio</label>
        <input id="rastreio" name="rastreio" data-cy="campo-rastreio" value="{{ old('rastreio', $frete->rastreio) }}">
        @error('rastreio') <span class="erro" data-cy="erro-rastreio">{{ $message }}</span> @enderror

        <label for="status">Status</label>
        <select id="status" name="status" data-cy="campo-status">
            @foreach (\App\Models\Frete::STATUS as $s)
                <option value="{{ $s }}" @selected(old('status', $frete->status) === $s)>{{ $s }}</option>
            @endforeach
        </select>
        @error('status') <span class="erro" data-cy="erro-status">{{ $message }}</span> @enderror

        <p><button class="btn" data-cy="salvar-frete">Salvar</button>
            <a class="btn btn-sec" href="{{ route('fretes.index') }}">Cancelar</a></p>
    </form>
@endsection
