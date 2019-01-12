<?php

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
        $this->call(PropertyTypeSeeder::class);
        $this->call(PeriodSeeder::class);
        $this->call(RoomTypeSeeder::class);

    }
}
