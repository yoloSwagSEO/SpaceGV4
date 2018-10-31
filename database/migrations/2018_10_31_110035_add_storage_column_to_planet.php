<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStorageColumnToPlanet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planets', function (Blueprint $table) {
           $table->float('metalStorage',25,4)->default(100000)->after('uradium');
           $table->float('cristalStorage',25,4)->default(100000)->after('metalStorage');
           $table->float('uradiumStorage',25,4)->default(100000)->after('cristalStorage');
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
