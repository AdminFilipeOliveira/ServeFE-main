<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
   public function allTasks()
{
    $tasks = DB::table('tasks')
    ->join('users', 'users.id', 'tasks.user_id')
    ->select('tasks.*', 'users.name as usname')
    ->get();


    return view('tasks.all_tasks', compact('tasks'));
}
function viewTask($id)
{
    $task = DB::table('tasks')->where('id', $id)->first();

    if (!$task) {
        abort(404, 'Task não encontrada');
    }

    return view('tasks.view_tasks', compact('task'));




}
function deleteTask($id){
    DB::table('tasks')->where('id', $id)->delete();

    return back();
}

}
