@extends('layouts.main_layout')

@section('content')
<h2>Prendas de Natal</h2>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Prenda</th>
            <th>Valor Previsto</th>
            <th>Valor Gasto</th>
            <th>Diferença</th>
            <th>Utilizador</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prendas as $prenda)
        <tr>
            <td>{{ $prenda->id }}</td>
            <td>{{ $prenda->nome_prenda }}</td>
            <td>{{ $prenda->valor_previsto }} €</td>
            <td>{{ $prenda->valor_gasto ?? '-' }} €</td>
            <td>
                {{ $prenda->valor_previsto - ($prenda->valor_gasto ?? 0) }} €
            </td>
            <td>{{ $prenda->nome_utilizador }}</td>
            <td>
                <a href="{{ route('prendas.view', $prenda->id) }}" class="btn btn-info">Ver</a>
                <a href="{{ route('prendas.delete', $prenda->id) }}" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/" class="btn btn-secondary">Voltar</a>


@endsection
