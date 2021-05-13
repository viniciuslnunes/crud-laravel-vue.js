<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            [
                'user_id'           => 1,
                'razao_social'      => 'Kaza Arquitetura Ltda',
                'nome_fantasia'     => 'Kaza Arquitetura',
                'cnpj'              => '22478404000128',
                'endereco'          => 'Rua Santa Carolina',
                'email'             => 'kazaarquitetura@gmail.com',
                'telefone'          => '4738020641',
                'nome_responsavel'  => 'Amanda Cristiane Silveira',
                'cpf'               => '74695721473',
                'celular'           => '47994622862',
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id'           => 1,
                'razao_social'      => 'Xpressi Comércio Exterior Ltda',
                'nome_fantasia'     => 'Xpressi',
                'cnpj'              => '65691157000156',
                'endereco'          => 'Rua das Palmeiras',
                'email'             => 'xpressicomercio@hotmail.com',
                'telefone'          => '5135161489',
                'nome_responsavel'  => 'Osvaldo José Souza',
                'cpf'               => '83328575383',
                'celular'           => '51994674705',
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id'           => 1,
                'razao_social'      => 'CriArte Organização de Eventos Ltda',
                'nome_fantasia'     => 'CriArte',
                'cnpj'              => '22041901000164',
                'endereco'          => 'Rua Padre Antônio Vieira',
                'email'             => 'criartltda@gmail.com',
                'telefone'          => '7128905557',
                'nome_responsavel'  => 'Patrícia Rafaela Yasmin Alves',
                'cpf'               => '63489167236',
                'celular'           => '71994148957',
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id'           => 2,
                'razao_social'      => 'Magnetis Consultoria de Investimentos ME',
                'nome_fantasia'     => 'Magnetis',
                'cnpj'              => '20024918000188',
                'endereco'          => 'Rua Clarêncio Jucá',
                'email'             => 'magnetisconsultoria@outlook.com',
                'telefone'          => '8226209873',
                'nome_responsavel'  => 'Gustavo Davi Drumond',
                'cpf'               => '73328107274',
                'celular'           => '82998646020',
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id'           => 2,
                'razao_social'      => 'MSS Panificadora Ltda. EPP',
                'nome_fantasia'     => 'Padaria Estrela',
                'cnpj'              => '19097265000188',
                'endereco'          => 'Beco Santo Antônio',
                'email'             => 'msspanificadora@outlook.com',
                'telefone'          => '3137507384',
                'nome_responsavel'  => 'Mateus Pietro Silva',
                'cpf'               => '53992294471',
                'celular'           => '31999629683',
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id'           => 2,
                'razao_social'      => 'Davi e Vitor Marcenaria Ltda',
                'nome_fantasia'     => 'Davi e Vitor Marcenaria',
                'cnpj'              => '10425103000157',
                'endereco'          => 'Rua S-33',
                'email'             => 'davivitormarcenaria@gmail.com',
                'telefone'          => '9539511641',
                'nome_responsavel'  => 'Davi Moraes',
                'cpf'               => '39901423058',
                'celular'           => '95992262960',
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id'           => 3,
                'razao_social'      => 'Carla Eletrônica Ltda',
                'nome_fantasia'     => 'Carla Eletrônica',
                'cnpj'              => '44807029000155',
                'endereco'          => 'Estrada Geraldo Costa Camargo',
                'email'             => 'presidencia@carlaeletronica.com.br',
                'telefone'          => '1927252939',
                'nome_responsavel'  => 'Carla Dias',
                'cpf'               => '64901893258',
                'celular'           => '19996189497',
                'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}