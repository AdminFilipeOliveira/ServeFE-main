@extends('layouts.main_layout')

@section('content')



<h2>Adicionar Task</h2>
{{-- Formulário para adicionar uma nova tarefa --}}

<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
{{-- Campo para o título da tarefa --}}
    <div class="mb-3">
        <label class="form-label">Título da Task</label>
        <input name="name" type="text" class="form-control" value="{{ old('name') }}">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
{{-- Campo para a descrição da tarefa --}}
    <div class="mb-3">
        <label class="form-label">Descrição da Task</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
{{-- Campo para selecionar o utilizador associado à tarefa --}}
    <div class="mb-3">
        <label class="form-label">User</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
{{-- Botão para submeter o formulário --}}
    <button type="submit" class="btn btn-primary">Adicionar Task</button>
</form>
@endsection
