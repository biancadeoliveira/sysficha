<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaDadosProjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_projeto', function (Blueprint $table) {
            $table->integer('id_dadocli')->autoIncrement()->comment('Chave Primaria da tabela');
            $table->string('valor')->comment('Valor do dado');
            $table->string('senha')->comment('Senha do dado se houver');
            $table->text('observacoes')->nullable()->comment('Observações');

            $table->integer('fk_id_dado');
            $table->integer('fk_id_projeto');

            $table->foreign('fk_id_dado')->references('id_dado')->on('dados');
            $table->foreign('fk_id_projeto')->references('id_projeto')->on('projeto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_projeto');
    }
}
