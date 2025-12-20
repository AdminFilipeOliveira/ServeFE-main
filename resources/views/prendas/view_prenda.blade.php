@extends('layouts.main_layout')

@section('content')
<h2>Detalhes da Prenda</h2>

<p>Prenda: {{ $prenda->nome_prenda }}</p>
<p>Utilizador: {{ $prenda->nome_utilizador }}</p>
<p>Valor Previsto: {{ $prenda->valor_previsto }} €</p>
<p>Valor Gasto: {{ $prenda->valor_gasto }} €</p>
<p>Diferença: {{ $prenda->valor_previsto - ($prenda->valor_gasto) }} €</p>

<a href="{{ route('prendas.all') }}" class="btn btn-secondary">Voltar</a>
@endsection


