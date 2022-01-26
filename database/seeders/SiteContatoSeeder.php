<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* não é necessario com a factory em uso!
        //fillable('nome','telefone','email','motivo_contato','mensagem)
        //instanciando o Objeto
        $contato = new SiteContato();
        $contato->nome           = 'jose';
        $contato->telefone       =  '3211111111';
        $contato->email          = 'jose@email.com';
        $contato->motivo_contato = 2;
        $contato->mensagem       = 'olá quero menos trabalho';
        
        $contato->save();

        //utilizando medoto create (atenção ao atibuto fillable)
        SiteContato::create([
            'nome'          => 'joao',
            'telefone'      => '322222222',
            'email'         => 'joao@email.com',
            'motivo_contato'=> 3,
            'mensagem'      => 'olá quero mais trabalho'
        ]);

        //metodo insert(classe db) * nao atualiza update_at e created_at
        \DB::table('site_contatos')->insert([
            'nome'          => 'mateus',
            'telefone'      => '3235264715',
            'email'         => 'mateus@email.com',
            'motivo_contato'=> 1,
            'mensagem'      => 'quero terminar o curso'
        ]);
        */

        //utilizando a factory
        
       // \App\Models\SiteContato::factory(100)->create();


    }
}
