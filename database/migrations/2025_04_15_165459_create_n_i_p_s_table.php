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
        Schema::create('n_i_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('ip',15);
            $table->string('pathpanel',2)->nullable;
            $table->string('porta',2)->nullable;
            $table->string('ponto',9)->nullable;
            $table->string('patrimonio',)->nullable;
            $table->string('responsa',45)->nullable;
            //divisão vem chave da tb divisas
            $table->unsignedBigInteger('divisas_id');
            $table->string('secao',80)->nullable;
            $table->foreign('divisas_id')->references('id')->on('divisas');
            //integridade 1 para 1

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('n_i_p_s');
    }
};
