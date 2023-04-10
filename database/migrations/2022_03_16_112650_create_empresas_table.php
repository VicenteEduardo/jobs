<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_user');
            $table->foreign('fk_user')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->string('nomeEmpresa');
            $table->string('imagem');
            $table->string('telefone');
            $table->string('nif');
            $table->string('email');

            $table->string('status')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
