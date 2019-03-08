<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Chave Primaria da tabela');
            $table->string('nome')->comment('Nome do funcionário');
            $table->string('email')->comment('Email');
            $table->string('password')->comment('Senha de login');
            $table->string('cargo')->comment('Cargo ocupado na empresa');
            $table->string('celular')->comment('Celular');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
