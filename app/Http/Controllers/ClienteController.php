<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private function regras(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'contato' => ['required', 'string', 'max:255'],
            'endereco' => ['required', 'string', 'max:255'],
        ];
    }

    public function index()
    {
        return view('clientes.index', ['clientes' => Cliente::orderBy('id')->paginate(10)]);
    }

    public function create()
    {
        return view('clientes.form', ['cliente' => new Cliente()]);
    }

    public function store(Request $request)
    {
        Cliente::create($request->validate($this->regras()));

        return redirect()->route('clientes.index')->with('sucesso', 'Cliente cadastrado com sucesso!');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.form', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->validate($this->regras()));

        return redirect()->route('clientes.index')->with('sucesso', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('sucesso', 'Cliente excluído com sucesso!');
    }
}
