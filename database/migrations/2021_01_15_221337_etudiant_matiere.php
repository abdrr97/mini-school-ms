<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EtudiantMatiere extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_matiere', function (Blueprint $table)
        {
            $table->foreignId('etudiant_id')->constrained();
            $table->foreignId('matiere_id')->constrained();
            $table->primary(['matiere_id', 'etudiant_id']);
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
        //
    }
}
