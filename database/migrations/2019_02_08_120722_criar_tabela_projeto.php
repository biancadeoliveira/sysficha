<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaProjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeto', function (Blueprint $table) {
            $table->integer('id_projeto')->autoIncrement()->comment('Chave Primaria da tabela');
            $table->string('nome')->comment('Nome do projeto');
            $table->text('descricao')->comment('Descrição do projeto');
            $table->date('dt_cadastrado')->comment('Data em que foi cadastrado no sistema');
            $table->string('status')->comment('Situação atual: Ativo, Inativo, Pausado');
            $table->integer('id_resp');

            $table->foreign('id_resp')->references('id')->on('responsavel');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projeto');
    }
}
