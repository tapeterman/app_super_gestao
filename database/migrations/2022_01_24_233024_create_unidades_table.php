<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade',5); //cm,mm,kg,grama
            $table->string('descricao',30);
            $table->timestamps();
        });

        //add relacionamento com table produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //add relacionamento com table produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover relacionamento com table produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });
        //add relacionamento com table produtos

        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');

    }
}
