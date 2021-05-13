@extends('layouts.master')
@section('title','Adicionar cliente')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Adicionar cliente
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

        <form method="post" action="{{ route('clientes.store') }}">
            <div class="row">
                <div class="col">
                    @csrf
                    <label for="razao_social">Razão Social:</label>
                    <input type="text" class="form-control" name="razao_social" />
                </div>
                <div class="col">
                    <label for="nome_fantasia">Nome Fantasia:</label>
                    <input type="text" class="form-control" name="nome_fantasia" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" class="form-control" name="cnpj" />
                </div>
                <div class="col">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" />
                </div>
                <div class="col">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="nome_responsavel">Responsável:</label>
                    <input type="text" class="form-control" name="nome_responsavel" />
                </div>
                <div class="col">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" />
                </div>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" name="celular" />
            </div>
            <button type="submit" class="btn btn-primary">Adicionar cliente</button>
        </form>
    </div>
</div>
@endsection