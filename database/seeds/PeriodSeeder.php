<?php

use App\Period;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Period::create([
            'name' => 'ONCE',
        ]);
        Period::create([
            'name' => 'REPEAT',
        ]);
    }
}
