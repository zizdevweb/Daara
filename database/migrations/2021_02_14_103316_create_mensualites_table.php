<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensualites', function (Blueprint $table) {
            $table->id();
            $table->string('mois');
            $table->integer('net_a_payer');
            $table->integer('montant_verser');
            $table->integer('montant_restant'); 
            $table->string('niveau'); 
            $table->unsignedBigInteger('eleve_id');
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
        Schema::dropIfExists('mensualites');
    }
}
