<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('PlanetId');
            $table->integer('MetalMineProduction');
            $table->integer('CristalMineProduction');
            $table->integer('UradiumMineProduction');
            $table->float('MetalMineFactor');
            $table->float('CristalMineFactor');
            $table->float('UradiumMineFactor');
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
        Schema::dropIfExists('productions');
    }
}
