<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::truncate();

        $status = [
            [
                'status_id' => 1,
                'status_name' => 'Unpaid',
                'status_description' => 'User failed to paid the reservation.'
            ],
            [
                'status_id' => 2,
                'status_name' => 'Paid',
                'status_description' => 'User successfully make the reservation.'
            ],
            [
                'status_id' => 3,
                'status_name' => 'Cancel',
                'status_description' => 'User cancel the reservation.'
            ]
        ];

        Status::insert($status);
    }
}
