<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlanetDoubleSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planets', function (Blueprint $table) {
            DB::statement('ALTER TABLE `planets` CHANGE `metal` `metal` DOUBLE(25,4) NOT NULL;');
            DB::statement('ALTER TABLE `planets` CHANGE `cristal` `cristal` DOUBLE(25,4) NOT NULL;');
            DB::statement('ALTER TABLE `planets` CHANGE `uradium` `uradium` DOUBLE(25,4) NOT NULL;');
            DB::statement('ALTER TABLE `planets` CHANGE `filonMetal` `filonMetal` DOUBLE(25,4) NOT NULL;');
            DB::statement('ALTER TABLE `planets` CHANGE `filonCristal` `filonCristal` DOUBLE(25,4) NOT NULL;');
            DB::statement('ALTER TABLE `planets` CHANGE `filonUradium` `filonUradium` DOUBLE(25,4) NOT NULL;');
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
