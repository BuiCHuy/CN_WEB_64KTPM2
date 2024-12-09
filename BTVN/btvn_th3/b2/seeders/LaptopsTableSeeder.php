<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $renter_id=DB::table('renters')->pluck('id');
        for ($i = 0; $i < 100; $i++) {
            DB::table('laptops')->insert([
                'brand'=>$faker->company,
                'model'=>$faker->bothify('??##'),
                'specification'=>$faker->text(50),
                'rental_status'=>$faker->boolean,
                'renter_id'=>$faker->randomElement($renter_id),
            ]);
        }
    }
}
