<template>
  <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->razao_social}}</td>
            <td>{{$cliente->nome_fantasia}}</td>
            <td>{{$cliente->nome_responsavel}}</td>
            <td>
                <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
                    <a href="{{ route('clientes.show', $cliente->id)}}" class="btn btn-primary btn-sm">Detalhes</a>
                    <a href="{{ route('clientes.edit', $cliente->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
</template>

<script>
export default {
    
}
</script>

<style>

</style>