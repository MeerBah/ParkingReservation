<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Seeder;

class ParkingTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Time::truncate();

        $time = [
            [
                'time_id' => 1,
                'time' => '10:00 AM - 12:00 PM',
            ],
            [
                'time_id' => 2,
                'time' => '12:00 PM - 02:00 PM',
            ],
            [
                'time_id' => 3,
                'time' => '02:00 PM - 04:00 PM',
            ],
            [
                'time_id' => 4,
                'time' => '04:00 PM - 06:00 PM',
            ],
            [
                'time_id' => 5,
                'time' => '06:00 PM - 08:00 PM',
            ],
            [
                'time_id' => 6,
                'time' => '08:00 PM - 10:00 PM',
            ],

        ];

        Time::insert($time);
        
    }
}
