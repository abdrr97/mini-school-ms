<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professeurs', function (Blueprint $table)
        {
            $table->id();
            $table->string('nom_complet');
            $table->string('address');
            $table->datetime('date_naissence');
            $table->string('genre');
            $table->string('email');
            $table->string('tele');
            $table->timestamps();

            $table->bigInteger('matiere_id')->unsigned()->index()->nullable();
            // $table->foreign('matiere_id')->references('id')->on('matieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professeurs');
    }
}
