<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('formateur_id')->constrained('formateurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('diplome_id')->constrained('diplomes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return 
     */
    public function down()
    {
        Schema::dropIfExists('matieres');
    }
}
