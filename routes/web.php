<?php
//
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PrendaNatalController;

Route::get('/', [UtilController::class, 'home'])->name('utils.welcome');

Route::get('/hello', function () {
    $myName= 'Sara';
    $myPass = 1234455;


    $myName = 'Margarida';

    return "<h1>Olá Mundo $myName</h1>";
})->name('utils.hello');


Route::get('/turma/{name}', function ($name) {
    //ir à base de dados e buscar toda a info da turma
    return "<h1>Turma: $name</h1>";
});

//Rotas relacionadas com utilizadores
Route::get('/insertintodb', [UserController::class, 'insertUserIntoDB']);

//Rota para eliminar um utilizador da base de dados
Route::get('/deleteusers', [UserController::class, 'deleteUserFromDB']);

//Rota para atualizar um utilizador da base de dados
Route::get('/updateintodb', [UserController::class, 'updateUserIntoDB']);

//Rota para selecionar um utilizador da base de dados
Route::fallback(function(){return view('utils.fallbackV');});

//Rota para selecionar um utilizador da base de dados
Route::get('/getusers', [UserController::class, 'selectUserFromDB']);

//Rota para ver os detalhes de um utilizador específico
Route::get('/adicionarusers', [UserController::class, 'addUser'])->name('users.add');

//Rota para ver todos os utilizadores
Route::get('/allusers', [UserController::class, 'allUsers'])->name('users.all');

//Rota para ver os detalhes de um utilizador específico
Route::get('/viewuser/{id}', [UserController::class, 'viewUser'])->name('users.view');

//Rota para deletar um utilizador específico
Route::get('/deleteuser/{id}', [UserController::class, 'deleteUser'])->name('users.delete');

//Rota para exibir o formulário de adição de utilizador
Route::get('/prendas', [PrendaNatalController::class, 'allPrendas'])->name('prendas.all');

//Rota para ver os detalhes de uma prenda específica
Route::get('/prendas/{id}', [PrendaNatalController::class, 'viewPrenda'])->name('prendas.view');

//Rota para deletar uma prenda específica
Route::get('/deleteprenda/{id}', [PrendaNatalController::class, 'deletePrenda'])->name('prendas.delete');

//Rota para exibir o formulário de adição de utilizador
Route::post('/store-user', [UserController::class, 'storeUser'])->name('users.store');

//Rotas relacionadas com tarefas
Route::get('/alltasks', [TaskController::class, 'allTasks'])->name('tasks.all');

//Rota para exibir o formulário de adição de tarefa
Route::get('/adicionartask', [TaskController::class, 'addTask'])->name('tasks.add');

//Rota para processar o formulário de adição de tarefa
Route::post('/store-task', [TaskController::class, 'storeTask'])->name('tasks.store');

//Rota para ver os detalhes de uma tarefa específica
Route::get('/viewtask/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');

//Rota para deletar uma tarefa específica
Route::get('/deletetask/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');
