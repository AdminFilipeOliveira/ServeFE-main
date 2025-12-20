@extends('layouts.main_layout')
@section('content')
<p>O email de contacto, caso detecte erros é {{$cesaeInfo['email']}}, na {{$cesaeInfo['address']}} </p>
    <h5>Lista de todos os users dev forma  estatica{{$cesaeInfo['email']}}</h5>
    <ul>
        @foreach ($students as $student)
        <li>{{$student['name']}}  e o email é {{$student['email']}}</li>
        @endforeach
    </ul>
    <h5>Users que sao carregados da base de dados(tabela de users)</h5>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Nif</th>
      <th></th>
      <th></th>

    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user )
    </tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->nif}}</td>
      <td><a href="{{route('users.view', $user->id)}}" class="btn btn-info">Ver</a></td>
      <td><a class="btn btn-danger" href="{{route('users.delete', $user->id)}}">Eliminar</a></td>

    </tr>
    @endforeach
  </tbody>
</table>

@endsection
