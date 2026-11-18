@extends('layout')

@section('conteudo')
    <h1>Fretes</h1>
    <p><a class="btn" href="{{ route('fretes.create') }}" data-cy="novo-frete">Novo frete</a></p>
    <table data-cy="tabela-fretes">
        <thead>
        <tr><th>Pedido</th><th>Endereço</th><th>Taxa</th><th>Previsão</th><th>Rastreio</th><th>Status</th><th>Ações</th></tr>
        </thead>
        <tbody>
        @foreach ($fretes as $f)
            <tr data-cy="linha-frete">
                <td>#{{ $f->pedido_id }} - {{ $f->pedido->cliente->nome }}</td>
                <td>{{ $f->endereco }}</td>
                <td>R$ {{ number_format($f->taxa, 2, ',', '.') }}</td>
                <td>{{ $f->data_prevista->format('d/m/Y') }}</td>
                <td data-cy="frete-rastreio">{{ $f->rastreio }}</td>
                <td data-cy="frete-status">{{ $f->status }}</td>
                <td>
                    <a class="btn btn-sec" href="{{ route('fretes.edit', $f) }}" data-cy="editar-frete">Editar</a>
                    <form class="inline" method="POST" action="{{ route('fretes.destroy', $f) }}"
                          onsubmit="return confirm('Excluir este frete?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-del" data-cy="excluir-frete">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
