<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->enum('jours', ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi']);
            $table->time('temps_debut');
            $table->time('temps_fin');
            $table->boolean('presence')->nullable();
            $table->foreignId('formateur_id')->constrained('formateurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('classe_id')->constrained('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('matiere_id')->constrained('matieres')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('seances');
    }
}
