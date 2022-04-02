<?php

namespace Database\Seeders;

use App\Models\BiodataTwo;
use App\Models\ScoreIq;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ScoreIqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScoreIq::truncate();
        $faker = Factory::create();

        $users = BiodataTwo::where('status', 'lolos')->get();

        foreach ($users as $user) {
            ScoreIq::create([
                'user_id'=>$user->user_id,
                'stage_id'=>$user->stage_id,
                'academy_year_id'=>$faker->randomElement([1,2,3,4]),
                'score_question_iq'=>rand(30,95),
                'correct'=>rand(1,50),
                'wrong'=>rand(1,50),
                'status'=>$faker->randomElement([null,'lolos','tidak']),
            ]);
        }
    }
}
