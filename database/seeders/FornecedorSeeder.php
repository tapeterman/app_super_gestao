<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o Objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 3';
        $fornecedor->site =  'www.fornecedor3.com.br';
        $fornecedor->uf = 'mg';
        $fornecedor->email = 'Fornecedor3@email.com';
        $fornecedor->save();

        //utilizando medoto create (atenção ao atibuto fillable)
        Fornecedor::create([
            'nome'  => 'Fornecedor 4',
            'site'  => 'www.fornecedor4.com.br',
            'uf'    => 'mg',
            'email' => 'Fornecedor4@email.com'
        ]);

        //metodo insert(classe db) * nao atualiza update_at e created_at
        \DB::table('fornecedores')->insert([
            'nome'  => 'Fornecedor 5',
            'site'  => 'www.fornecedor5.com.br',
            'uf'    => 'mg',
            'email' => 'Fornecedor5@email.com'
        ]);

    }
}
