<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PropostasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propostas')->insert([
            [
                'cliente_id'        => 1,
                'user_id'           => 1,
                'endereco'          => 'Rua Jorge Cecílio Daher',
                'valor_total'       => 10000.00,
                'valor_sinal'       => 2000.00,
                'qtde_parcelas'     => 4,
                'valor_parcelas'    => 2000.00,
                'data_pagamento'    => Carbon::create('2020', '03', '10'),
                'data_parcelas'     => Carbon::create('2020', '07', '10'),
                'arquivo'           => 'detalhes_proposta.PDF',
                'status'            => 0,
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cliente_id'        => 2,
                'user_id'           => 1,
                'endereco'          => 'Rua Treze',
                'valor_total'       => 8000.00,
                'valor_sinal'       => 1000.00,
                'qtde_parcelas'     => 7,
                'valor_parcelas'    => 1000.00,
                'data_pagamento'    => Carbon::create('2021', '01', '08'),
                'data_parcelas'     => Carbon::create('2021', '08', '08'),
                'arquivo'           => 'detalhes_proposta.PDF',
                'status'            => 0,
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cliente_id'        => 1,
                'user_id'           => 2,
                'endereco'          => 'Alameda Boa Ventura',
                'valor_total'       => 6000.00,
                'valor_sinal'       => 3000.00,
                'qtde_parcelas'     => 1,
                'valor_parcelas'    => 3000.00,
                'data_pagamento'    => Carbon::create('2021', '06', '22'),
                'data_parcelas'     => Carbon::create('2021', '07', '22'),
                'arquivo'           => 'segunda_proposta.PDF',
                'status'            => 1,
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
