@extends('layout')

@section('conteudo')
    <h1>Produtos</h1>
    <p><a class="btn" href="{{ route('produtos.create') }}" data-cy="novo-produto">Novo produto</a></p>
    <table data-cy="tabela-produtos">
        <thead>
        <tr><th>Nome</th><th>Categoria</th><th>Preço</th><th>Estoque</th><th>Ações</th></tr>
        </thead>
        <tbody>
        @foreach ($produtos as $p)
            <tr data-cy="linha-produto" class="{{ $p->estoqueBaixo() ? 'estoque-baixo' : '' }}">
                <td data-cy="produto-nome">{{ $p->nome }}</td>
                <td>{{ $p->categoria }}</td>
                <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                <td data-cy="produto-estoque">
                    {{ $p->estoque }}
                    @if ($p->estoqueBaixo())
                        <span class="badge-baixo" data-cy="alerta-estoque-baixo">Estoque baixo</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-sec" href="{{ route('produtos.edit', $p) }}" data-cy="editar-produto">Editar</a>
                    <form class="inline" method="POST" action="{{ route('produtos.destroy', $p) }}"
                          onsubmit="return confirm('Excluir este produto?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-del" data-cy="excluir-produto">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginacao" data-cy="paginacao">
        @if ($produtos->previousPageUrl())
            <a class="btn btn-sec" href="{{ $produtos->previousPageUrl() }}" data-cy="pagina-anterior">Anterior</a>
        @endif
        <span data-cy="pagina-atual">Página {{ $produtos->currentPage() }} de {{ $produtos->lastPage() }}</span>
        @if ($produtos->nextPageUrl())
            <a class="btn btn-sec" href="{{ $produtos->nextPageUrl() }}" data-cy="pagina-proxima">Próxima</a>
        @endif
    </div>
@endsection
