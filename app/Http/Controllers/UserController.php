<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
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
        $users = DB::table('users')->get();



        return view('users.all_users',compact('cesaeInfo', 'students', 'users'));
    }

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



}
