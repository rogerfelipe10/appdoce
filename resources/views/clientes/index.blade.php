@extends('layout')

@section('conteudo')
    <h1>Clientes</h1>
    <p><a class="btn" href="{{ route('clientes.create') }}" data-cy="novo-cliente">Novo cliente</a></p>
    <table data-cy="tabela-clientes">
        <thead>
        <tr><th>Nome</th><th>Contato</th><th>Endereço</th><th>Ações</th></tr>
        </thead>
        <tbody>
        @foreach ($clientes as $c)
            <tr data-cy="linha-cliente">
                <td data-cy="cliente-nome">{{ $c->nome }}</td>
                <td>{{ $c->contato }}</td>
                <td>{{ $c->endereco }}</td>
                <td>
                    <a class="btn btn-sec" href="{{ route('clientes.edit', $c) }}" data-cy="editar-cliente">Editar</a>
                    <form class="inline" method="POST" action="{{ route('clientes.destroy', $c) }}"
                          onsubmit="return confirm('Excluir este cliente?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-del" data-cy="excluir-cliente">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginacao">
        @if ($clientes->previousPageUrl())
            <a class="btn btn-sec" href="{{ $clientes->previousPageUrl() }}">Anterior</a>
        @endif
        @if ($clientes->nextPageUrl())
            <a class="btn btn-sec" href="{{ $clientes->nextPageUrl() }}">Próxima</a>
        @endif
    </div>
@endsection
