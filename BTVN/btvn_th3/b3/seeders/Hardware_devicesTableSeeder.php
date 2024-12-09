<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class Hardware_devicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $center_id = DB::table('It_centers')->pluck('id');
        for ($i = 0; $i < 100; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name'=>$faker->sentence($nbWords = 3),
                'type'=>$faker->randomElement(['Mouse','Keyboard','Headset']),
                'status'=>$faker->boolean,
                'center_id'=>$faker->randomElement($center_id),
            ]);
        }
    }
}
