<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cinema_id=DB::table('cinemas')->pluck('id');
        for ($i = 0; $i < 100; $i++) {
            DB::table('movies')->insert([
                'title'=>$faker->sentence($nbWords = 3),
                'director'=>$faker->name(),
                'release_date'=>$faker->date(),
                'duration'=>$faker->numberBetween(1,300),
                'cinema_id'=>$faker->randomElement($cinema_id),

            ]);
        }
    }
}
