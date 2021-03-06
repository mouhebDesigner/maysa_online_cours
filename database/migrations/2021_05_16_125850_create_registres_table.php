<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registres', function (Blueprint $table) {
            $table->id();
            $table->enum('etat', ['absent', 'present']);
            $table->foreignId('seance_id')->constrained('seances')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('formateur_id')->constrained('formateurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('stagiaire_id')->constrained('stagiaires')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('registres');
    }
}
