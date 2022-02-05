<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentosFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando coluna em produtos fk fornecedores
        Schema::table('produtos',function(Blueprint $table){
            //registro de fornecedor para estabelecer relacionamento
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Padrao',
                'site' => 'Padrao.com.br',
                'uf' => 'MG',
                'email' => 'Padrao@contato.com.br',
            ]);
            //criar depois do campo id
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos',function(Blueprint $table){

            $table->dropforeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
