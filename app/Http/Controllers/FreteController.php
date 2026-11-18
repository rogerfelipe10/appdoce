<?php

namespace App\Http\Controllers;

use App\Models\Frete;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FreteController extends Controller
{
    private function regras(): array
    {
        return [
            'pedido_id' => ['required', 'exists:pedidos,id'],
            'endereco' => ['required', 'string', 'max:255'],
            'taxa' => ['required', 'numeric', 'min:0'],
            'data_prevista' => ['required', 'date'],
            'rastreio' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in(Frete::STATUS)],
        ];
    }

    public function index()
    {
        return view('fretes.index', ['fretes' => Frete::with('pedido.cliente')->orderByDesc('id')->paginate(10)]);
    }

    public function create()
    {
        return view('fretes.form', [
            'frete' => new Frete(['status' => 'Preparando']),
            'pedidos' => Pedido::with('cliente')->orderByDesc('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Frete::create($request->validate($this->regras()));

        return redirect()->route('fretes.index')->with('sucesso', 'Frete cadastrado com sucesso!');
    }

    public function edit(Frete $frete)
    {
        return view('fretes.form', [
            'frete' => $frete,
            'pedidos' => Pedido::with('cliente')->orderByDesc('id')->get(),
        ]);
    }

    public function update(Request $request, Frete $frete)
    {
        $frete->update($request->validate($this->regras()));

        return redirect()->route('fretes.index')->with('sucesso', 'Frete atualizado com sucesso!');
    }

    public function destroy(Frete $frete)
    {
        $frete->delete();

        return redirect()->route('fretes.index')->with('sucesso', 'Frete excluído com sucesso!');
    }
}
