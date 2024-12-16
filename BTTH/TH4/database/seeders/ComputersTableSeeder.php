<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->company,
                'model'=>$faker->bothify('??-##'),
                'operating_system'=>$faker->randomElement(['window','linux','mac']),
                'processor'=>$faker->text(50),
                'memory'=>$faker->numberBetween(1,1000),
                'available'=>$faker->boolean
            ]);
        }
    }
}
