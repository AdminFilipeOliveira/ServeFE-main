@extends('layouts.main_layout')
@section('content')

        <h2>All Tasks</h2>
           <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Status</th>
      <th scope="col">Data de Conclusao</th>
      <th scope="col">User ID</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $task)
    </tr>
      <th scope="row">{{$task->id}}</th>
      <td>{{$task->name}}</td>
      <td>{{$task->status}}</td>
      <td>{{$task->due_at }}</td>
      <td>{{$task->usname }}</td>
      
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

