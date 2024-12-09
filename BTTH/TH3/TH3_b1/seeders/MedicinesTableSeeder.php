<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('medicines')->insert([
                'medicine_name' => $faker->name,
                'brand' => $faker->company,
                'dosage' => $faker->text(50),
                'form' =>$faker->randomElement(['nen','nang','xiro']),
                'price' => $faker->randomFloat(2, 10, 100),
                'stock' => $faker->randomNumber($nbDigits = 3),
            ]);
        }
    }
}
