<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function home(){
         //qq código de php que eu quiser; funções, variáveis, etc
        //código ficticio que vem de uma consulta à Base de Dados

        $surname = 'Monteiro';
        $name='Sara';

        return view('utils.home', compact('surname','name'));
    }

}
