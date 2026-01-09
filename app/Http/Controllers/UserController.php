<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//Controlador para gerir utilizadores
class UserController extends Controller
{
    //Exibe o formulário para adicionar um novo utilizador
    public function addUser(){

        $pageAdmin = 'António';
        return view('users.add_user', compact('pageAdmin'));
    }

    public function allUsers(){
        $cesaeInfo =
        ['name' =>'cesae',
        'email' => 'cesae@gmail.com',
        'address' =>' rua do cesae'];

        //simular consulta à base de dados
        $students = [
            ['name' =>'Rafael', 'email' =>'Rafael@gmail.com'],
            ['name' =>'Mafalda', 'email' =>'Mafalda@gmail.com'],
            ['name' =>'Luís', 'email' =>'Luís@gmail.com'],
            ['name' =>'Leandro', 'email' =>'Leandro@gmail.com'],
        ];

        //dd($cesaeInfo['name']);
        $users = User::all();



        return view('users.all_users',compact('cesaeInfo', 'students', 'users'));
    }
//Funções que interagem com a base de dados usando query builder
    public function insertUserIntoDB(){

        //validar se dados estão em conformidade com a estrutura da base de dados


        //se passar em todas as validações, insere então na base de dados
            DB::table('users')
        ->updateOrInsert(
            [
            'email' => 'Rafaela2@gmail.com',
            ],
            [
            'name'=>'Rafaela',
            'password' =>'RAfaela1234',
            'updated_at' =>now(),
            'nif' => '2444444444'
        ]);
        return response()->json('user inserido com sucesso');
    }
    public function updateUserIntoDB(){


        //validar se dados estão em conformidade com a estrutura da base de dados

        //se passar em todas as validações, insere então na base de dados
        DB::table('users')
        ->where('id', 3)
        ->update([
            'name'=>'Rafaela Mudou de Nome porque não gostava do antigo',
            'updated_at' => now(),
        ]);

        return response()->json('user atualizado com sucesso');
    }
    public function deleteUserFromDB(){

        DB::table('users')
        ->where('id', 5)
        ->delete();

        return response()->json('user apagado com sucesso');
    }
    public function selectUserFromDB(){
        $users = User::get()
        ->whereNotNull('updated_at')
        ->get();
        dd($users);
    }
    public function todasFuncoesFromDB(){
        $user = DB::table('users')
        ->where();get(to);


        return view('users.profile', compact('user'));
    }


    //Funcao para ver detalhes de um user
    public function viewUser($id){
        //query que vai buscar o user à base de dados

        $user = DB::table('users')
        ->where('id', $id)
        ->first();


        return view('users.view_user', compact('user'));
    }

    function deleteUser($id){
        //query que apaga o user da base de dados

         Db::table('tasks')
        ->where('user_id', $id)
        ->delete();


        DB::table('users')
        ->where('id', $id)
        ->delete();

        return back();
    }
    //query que vai buscar o user à base de dados
    public function storeUser(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:55|unique:users',
            'password' => 'required|string|min:8',

        ]);
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        return redirect()->route('users.all')->with('mensagem', 'User added successfully');



        //inserir na base de dados
        DB::table('users')
        ->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'nif' => $validated['nif'],

        ]);
    }

}
