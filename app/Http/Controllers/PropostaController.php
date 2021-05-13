<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Exports\PropostasExport;
use App\Proposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PropostaController extends Controller
{

    public function index()
    {
        $propostas = Proposta::where('user_id', Auth::user()->id)->paginate(7);
        return view('propostas.index', compact('propostas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $clientes = Cliente::where('user_id', Auth::user()->id)->get();
        return view('propostas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'cliente_id'        => ['required', 'integer'],
            'endereco'          => ['required', 'max:150'],
            'valor_total'       => ['required', 'numeric'],
            'valor_sinal'       => ['required', 'numeric'],
            'qtde_parcelas'     => ['required', 'integer'],
            'valor_parcelas'    => ['required', 'numeric'],
            'data_pagamento'    => ['required', 'date'],
            'data_parcelas'     => ['required', 'date'],
            'arquivo'           => ['required'],
            'status'            => ['required', 'boolean'],
        ]);
        $propostaData = $request->all();
        $propostaData['user_id'] = Auth::user()->id;
        Proposta::create($propostaData);
        return redirect()->route('propostas.index')->with('success', 'Proposta cadastrada com sucesso');
    }

    public function show($id)
    {
        $proposta = Proposta::findOrFail($id);
        if (!Auth::user()->can('view', $proposta)) {
            abort(403, trans('Desculpe, você não tem permissão :('));
        } else {
            return view('propostas.show', compact('proposta'));
        }
    }

    public function edit($id)
    {
        $proposta = Proposta::findOrFail($id);
        if (!Auth::user()->can('view', $proposta)) {
            abort(403, trans('Desculpe, você não tem permissão :('));
        } else {
            return view('propostas.edit', compact('proposta'));
        }
    }

    public function update(Request $request, $id)
    {
        $proposta = Proposta::findOrFail($id);
        if (!Auth::user()->can('view', $proposta)) {
            abort(403, trans('Desculpe, você não tem permissão :('));
        } else {
            request()->validate([
                'cliente_id'        => ['required', 'integer'],
                'endereco'          => ['required', 'max:150'],
                'valor_total'       => ['required', 'numeric'],
                'valor_sinal'       => ['required', 'numeric'],
                'qtde_parcelas'     => ['required', 'integer'],
                'valor_parcelas'    => ['required', 'numeric'],
                'data_pagamento'    => ['required', 'date'],
                'data_parcelas'     => ['required', 'date'],
                'arquivo'           => ['required'],
                'status'            => ['required', 'boolean'],
            ]);
            $proposta->update($request->all());
            return redirect()->route('propostas.index')->with('success', 'Proposta atualizada com sucesso');
        }
    }

    public function destroy($id)
    {
        $proposta = Proposta::findOrFail($id);
        if (!Auth::user()->can('view', $proposta)) {
            abort(403, trans('Desculpe, você não tem permissão :('));
        } else {
            $proposta->delete();
            return redirect()->route('propostas.index')->with('success', 'Proposta deletada com sucesso');
        }
    }

    public function search(Request $request)
    {
        $search_cliente = $request->get('search-cliente');
        $search_status = $request->get('search-status');
        $search_mes = $request->search_mes;

        if ($search_mes != 0) {
            $propostas = Proposta::with('cliente')
                ->where('cliente_id', 'like', '%' . $search_cliente . '%')
                ->where('status', 'like', '%' . $search_status . '%')
                ->whereMonth('created_at', $search_mes)
                ->where('user_id', '=', Auth::user()->id)
                ->paginate(7);
        } else {
            $propostas = Proposta::with('cliente')
                ->where('cliente_id', 'like', '%' . $search_cliente . '%')
                ->where('status', 'like', '%' . $search_status . '%')
                ->where('user_id', '=', Auth::user()->id)
                ->paginate(7);
        }
        return view('propostas.index', ['propostas' => $propostas]);
    }

    public function export()
    {
        return Excel::download(new PropostasExport, 'propostas.xlsx');
    }

    public function updateStatus(Request $request)
    {
        $data = $request->all();
        Proposta::where('id','=', $data['id'])->update(['status' => $data['status']]);
    }
}
