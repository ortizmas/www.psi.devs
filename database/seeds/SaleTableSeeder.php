<?php

use Illuminate\Database\Seeder;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Sale::create([
            'user_id' => 2,
            'course_id' => 1,
        ]);

        App\Sale::create([
            'user_id' => 2,
            'course_id' => 2,
        ]);
    }
}
