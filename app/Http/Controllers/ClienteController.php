<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::where('user_id', Auth::user()->id)->paginate(7);
        return view('clientes.index', compact('clientes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'razao_social' => ['required', 'unique:clientes', 'max:150'],
            'nome_fantasia' => ['required', 'unique:clientes', 'max:100'],
            'cnpj' => ['required', 'unique:clientes', 'max:14'],
            'endereco' => ['required', 'unique:clientes', 'max:150'],
            'email' => ['required', 'unique:clientes', 'max:100'],
            'telefone' => ['required', 'unique:clientes', 'max:11'],
            'nome_responsavel' => ['required', 'max:100'],
            'cpf' => ['required', 'max:11'],
            'celular' => ['required', 'max:11'],
        ]);

        $clienteData = $request->all();
        $clienteData['user_id'] = Auth::user()->id;
        Cliente::create($clienteData);
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        if (!Auth::user()->can('view', $cliente)) {
            abort(403, trans('Desculpe, você não tem permissão :('));
        } else {
            $propostas = Cliente::find($id)->propostas;
            return view('clientes.show', compact('cliente', 'propostas'));
        }
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        if (!Auth::user()->can('view', $cliente)) {
            abort(403, trans('Desculpe, você não tem permissão :('));
        } else {
            return view('clientes.edit', compact('cliente'));
        }
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        if (!Auth::user()->can('update', $cliente)) {
            abort(403, trans('Desculpe, você não tem permissão :('));
        } else {
            request()->validate([
                'razao_social'      => ['required', 'unique:clientes', 'max:150'],
                'nome_fantasia'     => ['required', 'unique:clientes', 'max:100'],
                'cnpj'              => ['required', 'unique:clientes', 'max:14'],
                'endereco'          => ['required', 'unique:clientes', 'max:150'],
                'email'             => ['required', 'unique:clientes', 'max:100'],
                'telefone'          => ['required', 'unique:clientes', 'max:11'],
                'nome_responsavel'  => ['required', 'max:100'],
                'cpf'               => ['required', 'max:11'],
                'celular'           => ['required', 'max:11'],
            ]);
            $cliente->update($request->all());
            return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso');
        }
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        if (!Auth::user()->can('delete', $cliente)) {
            abort(403, trans('Desculpe, você não tem permissão :('));
        } else {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'Cliente deletado com sucesso');
        }
    }
}
