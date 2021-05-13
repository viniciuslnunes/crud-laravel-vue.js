@extends('layouts.master')
@section('title','Editar cliente')

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

        <form method="post" action="{{ route('clientes.update', $cliente->id) }}">
            <div class="row">
                <div class="col">
                    @csrf
                    @method('PATCH')
                    <label for="razao_social">Razão Social:</label>
                    <input type="text" class="form-control" name="razao_social" value="{{ $cliente->razao_social }}" />
                </div>
                <div class="col">
                    <label for="nome_fantasia">Nome Fantasia:</label>
                    <input type="text" class="form-control" name="nome_fantasia"
                        value="{{ $cliente->nome_fantasia }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" class="form-control" name="cnpj" value="{{ $cliente->cnpj }}" />
                </div>
                <div class="col">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" value="{{ $cliente->endereco }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $cliente->email }}" />
                </div>
                <div class="col">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" value="{{ $cliente->telefone }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="nome_responsavel">Responsável:</label>
                    <input type="text" class="form-control" name="nome_responsavel"
                        value="{{ $cliente->nome_responsavel }}" />
                </div>
                <div class="col">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" value="{{ $cliente->cpf }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" name="celular" value="{{ $cliente->celular }}" />
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection