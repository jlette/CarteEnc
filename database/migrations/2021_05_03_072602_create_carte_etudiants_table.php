<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarteEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carte_etudiants', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('user_id');

            $table->string('nomEtudiant');
            $table->integer('dateEntreeENC');
            $table->integer('numeroTelephone');
            $table->string('email')->unique();
            $table->timestamps();
            $table->string('section');
            $table->string('nomfichierCV');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carte_etudiants');
    }

}

