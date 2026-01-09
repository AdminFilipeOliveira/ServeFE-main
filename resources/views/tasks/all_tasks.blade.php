@extends('layouts.main_layout')

@section('content')
<h2>All Tasks</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>User</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->usname }}</td>
            <td>
                <a href="{{ route('tasks.view', $task->id) }}" class="btn btn-info">Ver</a>
                <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
