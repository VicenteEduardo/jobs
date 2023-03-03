<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaVagaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_vaga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_categoria');
            $table->foreign('fk_categoria')->references('id')->on('vagas')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->string('nomeCategoria',255);
            $table->softDeletes();
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
        Schema::dropIfExists('categoria_vaga');
    }
}
