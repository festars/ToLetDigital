<?php

use App\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create([
            'name' => '1 BedRoom'
        ]);
        RoomType::create([
            'name' => '2 BedRoom'
        ]);
        RoomType::create([
            'name' => '3 BedRoom'
        ]);
        RoomType::create([
            'name' => '4 BedRoom'
        ]);
        RoomType::create([
            'name' => '5 BedRoom'
        ]);
        RoomType::create([
            'name' => 'Studio Apartment'
        ]);
    }
}
