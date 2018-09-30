<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             CountrySeeder::class,
             StateSeeder::class,
             CitySeeder::class,
             City3Seeder::class,
             City2Seeder::class,
             City4Seeder::class,
             IndustrySeeder::class,
             FunationalAreaSeeder::class,
         ]);
    }
}
