<?php

use Illuminate\Database\Seeder;
use App\Planet as Planet;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        // $this->call(UsersTableSeeder::class);

        for($i=0,$j=40;$i<$j;$i++){
            $dp = new Planet;
            $dp->name = $faker->name;
            $dp->userId = 0;
            $dp->type = 1;
            $dp->tempMin = -12;
            $dp->tempMax = 50;
            $dp->secteur = 1;
            $dp->system = 1;
            $dp->orbit = $i;
            $dp->subOrbit0 = 0;
            $dp->metal = 0;
            $dp->cristal = 0;
            $dp->uradium = 0;
            $dp->filonMetal = 1000000;
            $dp->filonCristal = 1000000;
            $dp->filonUradium = 1000000;
            $dp->modifMetal = 2;
            $dp->modifCristal = 2;
            $dp->modifUradium = 2;
            $dp->lastUpdate = time();
            $dp->save();

        }
    }
}
