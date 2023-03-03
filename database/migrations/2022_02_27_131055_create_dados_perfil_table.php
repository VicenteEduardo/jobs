<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosPerfilTable extends Migration
{

    public function up()
    {
        Schema::create('dados_perfil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_user');
            $table->foreign('fk_user')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->string('nomeCliente')->nullable();
            $table->string('bi')->nullable();
            $table->string('dataNascimento')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('residencia')->nullable();
            $table->string('telefone')->nullable();
            $table->string('whatssap')->nullable();
            $table->string('email')->nullable();
            $table->longText('ablilitacoesLiteriais')->nullable();
            $table->longText('formacacaoProfissional')->nullable();
            $table->longText('explerienciaProfissional')->nullable();
            $table->longText('idiomas')->nullable();
            $table->string('fotoPerfil',255);
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('dados_perfil');
    }
}
