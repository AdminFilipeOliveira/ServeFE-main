<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PrendaNatalController extends Controller
{
    // Listar todas as prendas
    public function allPrendas()
    {
        $prendas = DB::table('prendas_natal')
            ->join('users', 'users.id', '=', 'prendas_natal.utilizador_id')
            ->select(
                'prendas_natal.*',
                'users.name as nome_utilizador'
            )
            ->get();

        return view('prendas.all_prendas', compact('prendas'));
    }

    // Ver uma prenda
    public function viewPrenda($id)
    {
        $prenda = DB::table('prendas_natal')
            ->join('users', 'users.id', '=', 'prendas_natal.utilizador_id')
            ->select(
                'prendas_natal.*',
                'users.name as nome_utilizador'
            )
            ->where('prendas_natal.id', $id)
            ->first();

        if (!$prenda) {
            abort(404, 'Prenda não encontrada');
        }

        return view('prendas.view_prenda', compact('prenda'));
    }

    // Eliminar prenda
    public function deletePrenda($id)
    {
        DB::table('prendas_natal')
            ->where('id', $id)
            ->delete();

        return back();
    }
}
