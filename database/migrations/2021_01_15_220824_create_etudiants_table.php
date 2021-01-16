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
        Schema::create('etudiants', function (Blueprint $table)
        {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->longText('address');
            $table->string('gender');
            $table->datetime('birth_date')->nullable();
            $table->string('email');
            $table->string('parent_full_name');
            $table->string('parent_phone');
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
