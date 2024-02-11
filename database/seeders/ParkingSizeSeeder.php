<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class ParkingSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::truncate();

        $size = [
            [
                'size_id' => 1,
                'size_name' => "Small",
            ],
            [
                'size_id' => 2,
                'size_name' => "Medium",
            ],
            [
                'size_id' => 3,
                'size_name' => "Large",
            ],
        ];
        
        Size::insert($size);
        
    }
}
