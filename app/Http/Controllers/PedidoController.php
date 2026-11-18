<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PedidoController extends Controller
{
    public function index()
    {
        return view('pedidos.index', [
            'pedidos' => Pedido::with(['cliente', 'produto'])->orderByDesc('id')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pedidos.create', [
            'clientes' => Cliente::orderBy('nome')->get(),
            'produtos' => Produto::orderBy('nome')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'cliente_id' => ['required', 'exists:clientes,id'],
            'produto_id' => ['required', 'exists:produtos,id'],
            'quantidade' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($dados) {
            $produto = Produto::lockForUpdate()->findOrFail($dados['produto_id']);

            if ($dados['quantidade'] > $produto->estoque) {
                throw ValidationException::withMessages([
                    'quantidade' => "Estoque insuficiente: disponível {$produto->estoque}.",
                ]);
            }

            $produto->decrement('estoque', $dados['quantidade']);

            Pedido::create($dados + [
                'total' => $produto->preco * $dados['quantidade'],
                'status' => 'Confirmado',
            ]);
        });

        return redirect()->route('pedidos.index')->with('sucesso', 'Pedido registrado com sucesso!');
    }
}
