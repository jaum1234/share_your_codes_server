<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjetoCodigo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nome');
            $table->string('descricao');
            $table->string('linguagem');
            $table->string('cor');
            $table->integer('curtida')->default(0);
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projetos');
    }
}
