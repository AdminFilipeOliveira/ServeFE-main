<?php

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

//função raw que insere um user na Base de dados (teste do dbquery builder sem frontend)
Route::get('/insertintodb', [UserController::class, 'insertUserIntoDB']);
Route::get('/deleteusers', [UserController::class, 'deleteUserFromDB']);
Route::get('/updateintodb', [UserController::class, 'updateUserIntoDB']);

Route::fallback(function(){return view('utils.fallbackV');});
Route::get('/getusers', [UserController::class, 'selectUserFromDB']);
Route::get('/adicionarusers', [UserController::class, 'addUser'])->name('users.add');

Route::get('/allusers', [UserController::class, 'allUsers'])->name('users.all');
Route::get('/alltasks', [TaskController::class, 'allTasks'])->name('tasks.all');
Route::get('/viewuser/{id}', [UserController::class, 'viewUser'])->name('users.view');
Route::get('/deleteuser/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
Route::get('/viewtask/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');
Route::get('/deletetask/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');

Route::get('/prendas', [PrendaNatalController::class, 'allPrendas'])->name('prendas.all');
Route::get('/prendas/{id}', [PrendaNatalController::class, 'viewPrenda'])->name('prendas.view');



Route::get('/deleteprenda/{id}', [PrendaNatalController::class, 'deletePrenda'])->name('prendas.delete');

