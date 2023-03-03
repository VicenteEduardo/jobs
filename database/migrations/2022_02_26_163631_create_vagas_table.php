<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_user');
            $table->string('tituloEmprego', 255);
            $table->string('imagemEmprego', 255)->nullable();
            $table->string('emailEmprego', 255);
            $table->string('tempoEmprego', 255);
            $table->string('nomeEmresa', 255);
            $table->string('telefoneEmprego', 255);
            $table->longText('descricaoEmpreego');
            $table->string('tempoVaga');
            $table->string('dataVaga');
            $table->foreign('fk_user')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
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
        Schema::dropIfExists('vagas');
    }
}
