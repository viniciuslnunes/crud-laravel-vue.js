@extends('layouts.master')
@section('title','Detalhes do cliente')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Detalhes da proposta
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <td>Cliente:</td>
                    <td><a href="{{ route('clientes.show', $proposta->cliente_id) }}">{{$proposta->cliente->razao_social}}</a></td>
                    <td>Endereço da obra:</td>
                    <td>{{$proposta->endereco}}</td>
                </tr>
                <tr>    
                    <td>Valor total:</td>
                    <td>{{$proposta->valor_total}}</td>
                    <td>Sinal:</td>
                    <td>{{$proposta->valor_sinal}}</td>
                </tr>
                <tr>    
                    <td>Qtde. de parcelas:</td>
                    <td>{{$proposta->qtde_parcelas}}</td>
                    <td>Valor das parcelas:</td>
                    <td>{{$proposta->valor_parcelas}}</td>
                </tr>
                <tr>
                    <td>Ínicio do pagamento:</td>
                    <td>{{date('d/m/Y', strtotime($proposta->data_pagamento))}}</td>
                    <td>Data das parcelas:</td>
                    <td>{{date('d/m/Y', strtotime($proposta->data_parcelas))}}</td>
                </tr>
                <tr>
                    <td>Arquivo anexado:</td>
                    <td>{{$proposta->arquivo}}</td>
                    <td>Status:</td>
                    <td>
                        @if($proposta->status == 0)
                        aberta
                        @else
                        fechada
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection