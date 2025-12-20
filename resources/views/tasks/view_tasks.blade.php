@extends('layouts.main_layout')

@section('content')
<h2>Task</h2>

<p>ID: {{ $task->id }}</p>
<p>Título: {{ $task->name }}</p>
<p>Status: {{ $task->status }}</p>
<p>Data de Conclusão: {{ $task->due_at }}</p>
@endsection

