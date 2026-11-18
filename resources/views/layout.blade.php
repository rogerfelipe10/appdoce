<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doce Gestão</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 0; background: #fff7f9; color: #3b2a30; }
        nav { background: #d6336c; padding: 12px 24px; display: flex; gap: 18px; align-items: center; }
        nav a { color: #fff; text-decoration: none; font-weight: 600; }
        nav .marca { font-size: 1.2rem; margin-right: 12px; }
        main { max-width: 960px; margin: 24px auto; padding: 0 16px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { padding: 8px 10px; border-bottom: 1px solid #f1d4dc; text-align: left; }
        th { background: #fde2ea; }
        .btn { display: inline-block; background: #d6336c; color: #fff; border: 0; padding: 7px 14px; border-radius: 6px; cursor: pointer; text-decoration: none; font-size: .9rem; }
        .btn-sec { background: #6c757d; }
        .btn-del { background: #c92a2a; }
        .sucesso { background: #d3f9d8; padding: 10px; border-radius: 6px; margin-bottom: 14px; }
        .erro { color: #c92a2a; font-size: .85rem; display: block; }
        .badge-baixo { background: #ffe3e3; color: #c92a2a; padding: 2px 8px; border-radius: 10px; font-size: .8rem; font-weight: 700; }
        tr.estoque-baixo td { background: #fff0f0; }
        label { display: block; margin-top: 12px; font-weight: 600; }
        input, select { padding: 7px; width: 100%; max-width: 380px; box-sizing: border-box; }
        form.inline { display: inline; }
        .paginacao { margin-top: 14px; display: flex; gap: 12px; }
    </style>
</head>
<body>
<nav>
    <a class="marca" href="{{ route('home') }}" data-cy="menu-home">🧁 Doce Gestão</a>
    <a href="{{ route('produtos.index') }}" data-cy="menu-produtos">Produtos</a>
    <a href="{{ route('clientes.index') }}" data-cy="menu-clientes">Clientes</a>
    <a href="{{ route('pedidos.index') }}" data-cy="menu-pedidos">Pedidos</a>
    <a href="{{ route('fretes.index') }}" data-cy="menu-fretes">Fretes</a>
</nav>
<main>
    @if (session('sucesso'))
        <div class="sucesso" data-cy="mensagem-sucesso">{{ session('sucesso') }}</div>
    @endif
    @yield('conteudo')
</main>
</body>
</html>
