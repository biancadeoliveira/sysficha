<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaResponsavel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavel', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Chave Primaria da tabela');
            $table->string('nome')->comment('Nome da pessoa responsável');
            $table->string('email')->nullable()->comment('E-mail do responsável');
            $table->string('skype')->nullable()->comment('Skype do responsável');
            $table->string('telefone')->nullable()->comment('E-mail do responsável');
            $table->string('celular')->nullable()->comment('Celular do responsável');
            $table->date('dt_cadastrado')->comment('Data em que foi cadastrado no sistema');
            $table->date('dt_inicio')->comment('Data em que foi cadastrado no sistema');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsavel');
    }
}
