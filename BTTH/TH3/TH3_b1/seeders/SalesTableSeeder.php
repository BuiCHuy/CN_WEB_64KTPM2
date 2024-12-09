<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $med_id=DB::table('medicines')->pluck('medicine_id');
        for ($i = 0; $i < 100; $i++) {
            DB::table('sales')->insert([
                'medicine_id'=>$faker->randomElement($med_id),
                'quantity'=>$faker->randomNumber(),
                'sale_date'=>$faker->date(),
                'customer_phone'=>$faker->numerify('0#########'),

            ]);
        }
    }
}
