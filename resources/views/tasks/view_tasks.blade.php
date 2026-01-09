@extends('layouts.main_layout')

@section('content')
<h2>Task</h2>

<p><strong>ID:</strong> {{ $task->id }}</p>
<p><strong>Título:</strong> {{ $task->name }}</p>
<p><strong>Descrição:</strong> {{ $task->description }}</p>
@endsection

