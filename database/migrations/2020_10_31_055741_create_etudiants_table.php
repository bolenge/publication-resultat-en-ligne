<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('date_naissance');
            $table->string('lieu_naissance');
            $table->string('telephone');
            $table->string('email');
            $table->string('etat_civil');
            $table->string('adresse');
            $table->string('profession');
            $table->string('password');
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
        Schema::dropIfExists('etudiants');
    }
}
