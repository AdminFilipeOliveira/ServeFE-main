@extends('layouts.main_layout')
@section('content')
    <h3>Home Page da {{ $surname ? $surname : 'escola' }}</h3>

    @if ($surname)
        <h5>Olá {{ $surname }}</h5>
        <img  height="20px"  src="{{ asset('images/logo.png') }}" alt="">
        <br>
    @else
    <h6>Olá Utilizador</h6>
    <img src="{{asset('images/nophoto.jpg')}}" alt="">

    @endif


    <img src="{{ asset('images/Screenshot 2025-10-09 143141.png') }}" alt="">
    <ul>
        <li><a href="{{ route('utils.hello') }}">Olá mundo!</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar Users</a></li>
        <li><a href="{{route('users.all')}}">Todos os Users</a></li>
        <li><a href="{{route('tasks.all')}}">Todas as Tasks</a></li>
        <li><a href="{{route('prendas.all')}}">Todas as Prendas de Natal</a></li>
        

    </ul>
@endsection
