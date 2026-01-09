<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    //Lista todas as tarefas com o nome do usuário associado
    public function allTasks()
    {
        $tasks = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select('tasks.*', 'users.name as usname')
            ->get();

        return view('tasks.all_tasks', compact('tasks'));
    }
//Exibe os detalhes de uma tarefa específica
    public function viewTask($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();

        if (!$task) {
            abort(404);
        }

        return view('tasks.view_tasks', compact('task'));
    }
//Exclui uma tarefa específica
    public function deleteTask($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return back();
    }



    
//Exibe o formulário para adicionar uma nova tarefa
    public function addTask()
    {
        $users = DB::table('users')->get();
        return view('tasks.add_task', compact('users'));
    }
//Armazena uma nova tarefa no banco de dados
    public function storeTask(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
//Inserção segura usando query builder
        DB::table('tasks')->insert([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'user_id' => $validated['user_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
//Redireciona com uma mensagem de sucesso
        return redirect()->route('tasks.all')
            ->with('mensagem', 'Tarefa criada com sucesso!');
    }
}
