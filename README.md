# Doce Gestão

Sistema de gestão para confeitaria feito em Laravel: produtos, clientes, pedidos e fretes.

- **Produtos:** cadastro com categoria, preço, estoque e estoque mínimo (com alerta de estoque baixo).
- **Clientes:** cadastro com contato e endereço.
- **Pedidos:** escolhem cliente e produto e dão baixa automática no estoque; recusam quantidade acima do disponível.
- **Fretes:** vinculados a um pedido, com endereço, taxa, data prevista, rastreio e status até a entrega.

## Rodar

Com Docker:

```bash
./docker/install.sh
./docker/start.sh        # http://localhost:8000
```

Sem Docker (PHP 8.3+ e Composer):

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve --port=8000
```

Para recriar o banco com os dados de exemplo: `php artisan migrate:fresh --seed`.
