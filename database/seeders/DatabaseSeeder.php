<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(FornecedorSeeder::class); utilizando oarquivo seeder

        //novo metodo sem necessidade do seeder(utiliza a factory)
        \App\Models\SiteContato::factory(100)->create(); 
        \App\Models\Fornecedor::factory(100)->create();
    }
}
