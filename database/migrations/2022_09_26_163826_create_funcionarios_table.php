<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf', 14)->unique('cpf');
            $table->string('nome', 500);
            $table->string('carteira_trabalho', 14);
            $table->unsignedBigInteger('setor_id')->index('fk_funcionario_setor');
            $table->string('telefone_1', 15);
            $table->string('telefone_2', 15)->nullable();
            $table->timestamps();
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
