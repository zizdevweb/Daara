<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuteursTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuteurs', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->nullable();
            $table->integer('telephone');
            $table->string('adresse');
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
        Schema::dropIfExists('tuteurs');
    }
}
