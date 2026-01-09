<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrendaNatal extends Model
{
    use HasFactory;

    // Nome da tabela
    protected $table = 'prendas_natal';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome_prenda',
        'valor_previsto',
        'valor_gasto',
        'utilizador_id',
    ];

    //Uma prenda pertence a um utilizador

    public function utilizador()
    {
        return $this->belongsTo(User::class, 'utilizador_id');
    }
}
