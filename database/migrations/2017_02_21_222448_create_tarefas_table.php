<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function(Blueprint $table){
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('servico_id')->unsigned();
            $table->double('valor', 15, 2);
            $table->dateTime('horario_inicio');
            $table->dateTime('horario_fim');
            $table->enum('pago', ['S', 'N'])->nullable()->default('N');
            $table->enum('desmarcado', ['S', 'N'])->nullable()->default('N');
            $table->enum('faltou', ['S', 'N'])->nullable()->default('N');

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('servico_id')->references('id')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tarefas');
    }
}
