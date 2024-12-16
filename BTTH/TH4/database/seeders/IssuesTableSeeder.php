<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $compid=DB::table('computers')->pluck('id');
        for ($i = 0; $i < 10; $i++) {
            DB::table('issues')->insert([
                'computer_id'=>$faker->randomElement($compid),
                'reported_by'=>$faker->name,
                'reported_date'=>$faker->date,
                'description'=>$faker->text,
                'urgency'=>$faker->randomElement(['Low','Medium','High']),
                'status'=>$faker->randomElement(['Open','Resolved','In Progress']),
            ]);
        }
    }
}
