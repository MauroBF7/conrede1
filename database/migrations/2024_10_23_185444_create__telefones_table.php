<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->id();
            $table->string('ramaln',9);
            $table->string('responsa',40)->nullable;
            //divisão vem chave da tb divisas
            $table->unsignedBigInteger('divisas_id');
            $table->string('secao')->nullable;
            //endereço vem chave da tb enderecos
            $table->unsignedBigInteger('enderecos_id');
            $table->timestamps();
            $table->foreign('divisas_id')->references('id')->on('divisas');
            //integridade 1 para 1
            //$table->unique('divisas_id');
            $table->foreign('enderecos_id')->references('id')->on('enderecos');
            //integridade 1 para 1
            $table->unique('enderecos_id');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefones');
    }
};
