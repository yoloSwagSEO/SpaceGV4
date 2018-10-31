<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->increments('id');
            //informations
            $table->string('name');
            $table->integer('userId');
            $table->integer('type');
            $table->float('tempMin');
            $table->float('tempMax');

            //positions
            $table->integer('secteur');
            $table->integer('system');
            $table->integer('orbit');
            $table->integer('subOrbit0');

            //ressources
            $table->float('metal');
            $table->float('cristal');
            $table->float('uradium');
            $table->float('filonMetal');
            $table->float('filonCristal');
            $table->float('filonUradium');

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
        Schema::dropIfExists('planets');
    }
}
