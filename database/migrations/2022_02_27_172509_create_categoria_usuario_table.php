<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_usuario', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fk_cliente');
            $table->foreign('fk_cliente')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
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
        Schema::dropIfExists('categoria_usuario');
    }
}
