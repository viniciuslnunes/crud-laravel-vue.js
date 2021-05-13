@extends('layouts.master')
@section('title','Detalhes do cliente')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Detalhes do cliente
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <td>Razão Social:</td>
                    <td>{{$cliente->razao_social}}</td>
                    <td>Nome Fantasia:</td>
                    <td>{{$cliente->nome_fantasia}}</td>
                </tr>
                <tr>
                    <td>CNPJ:</td>
                    <td>{{$cliente->cnpj}}</td>
                    <td>Endereço:</td>
                    <td>{{$cliente->endereco}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{$cliente->email}}</td>
                    <td>Telefone:</td>
                    <td>{{$cliente->telefone}}</td>
                </tr>
                <tr>
                    <td>Responsável:</td>
                    <td>{{$cliente->nome_responsavel}}</td>
                    <td>CPF:</td>
                    <td>{{$cliente->cpf}}</td>
                </tr>
                <tr>
                    <td>Celular:</td>
                    <td>{{$cliente->celular}}</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;">Propostas</td>
                </tr>
                <tr>
                    <td>#</td>
                    <td>Proposta feita em</td>
                    <td>Total R$</td>
                    <td>Status</td>
                </tr>
                @foreach($propostas as $proposta)
                <tr>
                    <td><a href="{{ route('propostas.show', $proposta->id) }}">{{$proposta->id}}</a></td>
                    <td>{{date('d/m/Y', strtotime($proposta->created_at))}}</td>
                    <td>{{$proposta->valor_total}}</td>
                    <td>
                        @if($proposta->status == 0)
                        aberta
                        @else
                        fechada
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection