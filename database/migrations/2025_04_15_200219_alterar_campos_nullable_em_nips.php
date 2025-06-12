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
        Schema::table('n_i_p_s', function (Blueprint $table) {
            $table->string('pathpanel')->nullable()->change();
            $table->string('porta')->nullable()->change();
            $table->string('psw')->nullable()->change();
            $table->string('ponto')->nullable()->change();
            $table->string('patrimonio')->nullable()->change();
            $table->string('responsa')->nullable()->change();
            $table->unsignedBigInteger('divisas_id')->nullable()->change();
            $table->string('secao')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('n_i_p_s', function (Blueprint $table) {
            $table->string('pathpanel')->nullable(false)->change();
            $table->string('porta')->nullable(false)->change();
            $table->string('psw')->nullable(false)->change();
            $table->string('ponto')->nullable(false)->change();
            $table->string('patrimonio')->nullable(false)->change();
            $table->string('responsa')->nullable(false)->change();
            $table->unsignedBigInteger('divisas_id')->nullable(false)->change();
            $table->string('secao')->nullable(false)->change();
        });
    }
};
