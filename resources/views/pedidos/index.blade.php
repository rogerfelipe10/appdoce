@extends('layout')

@section('conteudo')
    <h1>Pedidos</h1>
    <p><a class="btn" href="{{ route('pedidos.create') }}" data-cy="novo-pedido">Novo pedido</a></p>
    <table data-cy="tabela-pedidos">
        <thead>
        <tr><th>#</th><th>Cliente</th><th>Produto</th><th>Qtd</th><th>Total</th><th>Status</th></tr>
        </thead>
        <tbody>
        @foreach ($pedidos as $p)
            <tr data-cy="linha-pedido">
                <td>{{ $p->id }}</td>
                <td>{{ $p->cliente->nome }}</td>
                <td>{{ $p->produto->nome }}</td>
                <td>{{ $p->quantidade }}</td>
                <td>R$ {{ number_format($p->total, 2, ',', '.') }}</td>
                <td data-cy="pedido-status">{{ $p->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
