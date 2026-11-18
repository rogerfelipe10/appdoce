<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdutoController extends Controller
{
    private function regras(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'categoria' => ['required', Rule::in(Produto::CATEGORIAS)],
            'preco' => ['required', 'numeric', 'min:0'],
            'estoque' => ['required', 'integer', 'min:0'],
            'estoque_minimo' => ['required', 'integer', 'min:0'],
        ];
    }

    public function index()
    {
        return view('produtos.index', ['produtos' => Produto::orderBy('id')->paginate(10)]);
    }

    public function create()
    {
        return view('produtos.form', ['produto' => new Produto()]);
    }

    public function store(Request $request)
    {
        Produto::create($request->validate($this->regras()));

        return redirect()->route('produtos.index')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.form', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->validate($this->regras()));

        return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Produto excluído com sucesso!');
    }
}
