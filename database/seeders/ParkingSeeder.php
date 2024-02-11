<?php

namespace Database\Seeders;

use App\Models\Parking;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ParkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parking::truncate();
        $now = Carbon::now();

        $parking = [
            [
                'parking_id' => 1,
                'parking_slot' => 'A01',
                'parking_time_id' => 1,
                'created_at' => $now
            ],
            [
                'parking_id' => 2,
                'parking_slot' => 'A02',
                'parking_time_id' => 1,
                'created_at' => $now

            ],
            [
                'parking_id' => 3,
                'parking_slot' => 'A03',
                'parking_time_id' => 1,
                'created_at' => $now

            ],
            [
                'parking_id' => 4,
                'parking_slot' => 'A04',
                'parking_time_id' => 1,
                'created_at' => $now

            ],
            [
                'parking_id' => 5,
                'parking_slot' => 'A05',
                'parking_time_id' => 1,
                'created_at' => $now

            ],
            [
                'parking_id' => 6,
                'parking_slot' => 'A06',
                'parking_time_id' => 1,
                'created_at' => $now

            ],
            [
                'parking_id' => 7,
                'parking_slot' => 'A01',
                'parking_time_id' => 2,
                'created_at' => $now

            ],
            [
                'parking_id' => 8,
                'parking_slot' => 'A02',
                'parking_time_id' => 2,
                'created_at' => $now

            ],
            [
                'parking_id' => 9,
                'parking_slot' => 'A03',
                'parking_time_id' => 2,
                'created_at' => $now

            ],
            [
                'parking_id' => 10,
                'parking_slot' => 'A04',
                'parking_time_id' => 2,
                'created_at' => $now

            ],
            [
                'parking_id' => 11,
                'parking_slot' => 'A05',
                'parking_time_id' => 2,
                'created_at' => $now

            ],
            [
                'parking_id' => 12,
                'parking_slot' => 'A06',
                'parking_time_id' => 2,
                'created_at' => $now

            ],
            [
                'parking_id' => 13,
                'parking_slot' => 'A01',
                'parking_time_id' => 3,
                'created_at' => $now

            ],
            [
                'parking_id' => 14,
                'parking_slot' => 'A02',
                'parking_time_id' => 3,
                'created_at' => $now

            ],
            [
                'parking_id' => 15,
                'parking_slot' => 'A03',
                'parking_time_id' => 3,
                'created_at' => $now

            ],
            [
                'parking_id' => 16,
                'parking_slot' => 'A04',
                'parking_time_id' => 3,
                'created_at' => $now

            ],
            [
                'parking_id' => 17,
                'parking_slot' => 'A05',
                'parking_time_id' => 3,
                'created_at' => $now

            ],
            [
                'parking_id' => 18,
                'parking_slot' => 'A06',
                'parking_time_id' => 3,
                'created_at' => $now

            ],
            [
                'parking_id' => 19,
                'parking_slot' => 'A01',
                'parking_time_id' => 4,
                'created_at' => $now

            ],
            [
                'parking_id' => 20,
                'parking_slot' => 'A02',
                'parking_time_id' => 4,
                'created_at' => $now

            ],
            [
                'parking_id' => 21,
                'parking_slot' => 'A03',
                'parking_time_id' => 4,
                'created_at' => $now

            ],
            [
                'parking_id' => 22,
                'parking_slot' => 'A04',
                'parking_time_id' => 4,
                'created_at' => $now

            ],
            [
                'parking_id' => 23,
                'parking_slot' => 'A05',
                'parking_time_id' => 4,
                'created_at' => $now

            ],
            [
                'parking_id' => 24,
                'parking_slot' => 'A06',
                'parking_time_id' => 4,
                'created_at' => $now

            ],
            [
                'parking_id' => 25,
                'parking_slot' => 'A01',
                'parking_time_id' => 5,
                'created_at' => $now

            ],
            [
                'parking_id' => 26,
                'parking_slot' => 'A02',
                'parking_time_id' => 5,
                'created_at' => $now

            ],
            [
                'parking_id' => 27,
                'parking_slot' => 'A03',
                'parking_time_id' => 5,
                'created_at' => $now

            ],
            [
                'parking_id' => 28,
                'parking_slot' => 'A04',
                'parking_time_id' => 5,
                'created_at' => $now

            ],
            [
                'parking_id' => 29,
                'parking_slot' => 'A05',
                'parking_time_id' => 5,
                'created_at' => $now

            ],
            [
                'parking_id' => 30,
                'parking_slot' => 'A06',
                'parking_time_id' => 5,
                'created_at' => $now

            ],
            [
                'parking_id' => 31,
                'parking_slot' => 'A01',
                'parking_time_id' => 6,
                'created_at' => $now

            ],
            [
                'parking_id' => 32,
                'parking_slot' => 'A02',
                'parking_time_id' => 6,
                'created_at' => $now

            ],
            [
                'parking_id' => 33,
                'parking_slot' => 'A03',
                'parking_time_id' => 6,
                'created_at' => $now

            ],
            [
                'parking_id' => 34,
                'parking_slot' => 'A04',
                'parking_time_id' => 6,
                'created_at' => $now

            ],
            [
                'parking_id' => 35,
                'parking_slot' => 'A05',
                'parking_time_id' => 6,
                'created_at' => $now

            ],
            [
                'parking_id' => 36,
                'parking_slot' => 'A06',
                'parking_time_id' => 6,
                'created_at' => $now

            ],
        ];

        Parking::insert($parking);

    }
}
