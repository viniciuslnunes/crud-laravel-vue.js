<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    protected $table = 'propostas';
    protected $fillable = [
        'cliente_id', 'user_id', 'endereco', 'valor_total', 'valor_sinal', 'qtde_parcelas', 
        'valor_parcelas', 'data_pagamento', 'data_parcelas', 'arquivo', 'status'
    ];

    public function cliente() {
        return $this->belongsTo('App\Cliente');
    }
}
