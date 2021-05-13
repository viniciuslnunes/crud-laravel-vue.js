@extends('layouts.master')
@section('title','Editar proposta')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Update Shows
    </div>
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ route('propostas.update', $proposta->id) }}">
            <div class="row">
                <div class="col">
                    @csrf
                    @method('PATCH')
                    <label for="cliente_id">Cliente:</label>
                    <input type="text" class="form-control" name="endereco" value="{{$proposta->cliente->razao_social}}"
                        readonly />
                </div>
                <div class="col">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" value="{{$proposta->endereco}}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="valor_total">Valor total:</label>
                    <input type="number" step="0.01" min="0" max="999999" class="form-control" name="valor_total"
                        value="{{$proposta->valor_total}}" />
                </div>
                <div class="col">
                    <label for="valor_sinal">Sinal:</label>
                    <input type="number" step="0.01" min="0" max="99999" class="form-control" name="valor_sinal"
                        value="{{$proposta->valor_sinal}}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="qtde_parcelas">Quantidade de parcelas:</label>
                    <input type="number" min="0" max="48" class="form-control" name="qtde_parcelas"
                        value="{{$proposta->qtde_parcelas}}" />
                </div>
                <div class="col">
                    <label for="valor_parcelas">Valor das parcelas:</label>
                    <input type="number" step="0.01" min="0" max="99999" class="form-control" name="valor_parcelas"
                        value="{{$proposta->valor_parcelas}}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="data_pagamento">Ínicio do pagamento:</label>
                    <input type="date" class="form-control" name="data_pagamento"
                        value="{{$proposta->data_pagamento}}" />
                </div>
                <div class="col">
                    <label for="data_parcelas">Data das parcelas:</label>
                    <input type="date" class="form-control" name="data_parcelas" value="{{$proposta->data_parcelas}}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customFile">Anexar arquivo:</label>
                        <div class="custom-file" id="customFile">
                            <input type="file" class="custom-file-input" name="arquivo" id="inputFile"
                                aria-describedby="inputFile">
                            <label class="custom-file-label form-control-file"
                                for="inputFile">Procurar
                                arquivo...</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label for="status">Status</label>
                    <select class="custom-select" name="status">
                        @if($proposta->status == 0)
                        <option value="0" selected>aberta</option>
                        <option value="1">fechada</option>
                        @else
                        <option value="0">aberta</option>
                        <option value="1" selected>fechada</option>
                        @endif
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

<script>
    $('.custom-file-input').on('change', function () {
        var fileName = $(this).val();
        $(this).next('.form-control-file').html(fileName);
    })
</script>
@endsection