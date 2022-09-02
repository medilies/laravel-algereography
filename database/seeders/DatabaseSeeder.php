<?php

namespace theHocineSaad\LaravelAlgereography\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            WilayaSeeder::class,
            DairaSeeder::class,
        ]);
    }
}
