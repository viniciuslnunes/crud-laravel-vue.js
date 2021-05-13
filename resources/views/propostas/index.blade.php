@extends('layouts.master')
@section('title','Início')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row mb-4">
    <div class="col">
        <form action="/search" method="get">
            <div class="form-row align-items-center">
                <div class="col">
                    <select class="custom-select" name="search_mes" id="search_mes">
                        <option value="0">Mês</option>
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>
                <div class="col-6">
                    <input type="number" min="1" step="1" class="form-control" name="search-cliente"
                        placeholder="ID do cliente">
                </div>
                <div class="col">
                    <select class="custom-select" name="search-status">
                        <option value="">Status</option>
                        <option value="0">aberta</option>
                        <option value="1">fechada</option>
                    </select>
                </div>
                <div class="col">
                    <button class="btn btn-outline-secondary" type="submit">Procurar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Proposta feita em</th>
            <th scope="col">Início do pgto.</th>
            <th scope="col">Total R$</th>
            <th scope="col">Parcelas</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($propostas as $proposta)
        <tr>
            <td>{{$proposta->id}}</td>
            <td>{{$proposta->cliente->razao_social}}</td>
            <td>{{date('d/m/Y', strtotime($proposta->created_at))}}</td>
            <td>{{date('d/m/Y', strtotime($proposta->data_pagamento))}}</td>
            <td>{{$proposta->valor_total}}</td>
            <td>{{$proposta->qtde_parcelas}}</td>
            <td>
                <select class="custom-select" name="status" id="{{$proposta->id}}">
                    @if($proposta->status == 0)
                    <option value="0" selected>aberta</option>
                    <option value="1">fechada</option>
                    @else
                    <option value="0">aberta</option>
                    <option value="1" selected>fechada</option>
                    @endif
                </select>
            </td>
            <td>
                <form action="{{ route('propostas.destroy', $proposta->id)}}" method="post">
                    <a href="{{ route('propostas.show', $proposta->id)}}" class="btn btn-primary btn-sm">Detalhes</a>
                    <a href="{{ route('propostas.edit', $proposta->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $propostas->links() !!}
<a class="btn btn-primary mt-1" href="{{action('PropostaController@export')}}" role="button">Exportar para Excel</a>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("select[name ='status']").change(function () {
        var valor = $(this).val();
        var id = this.id;
        $.ajax({
           type:'POST',
           url:'updatestatus',
           data:{status:valor, id:id},
        });
    });
</script>
@endsection