<?php

namespace Database\Seeders;

use App\Models\ScoreIq;
use App\Models\ScorePersonal;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ScorePersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScorePersonal::truncate();
        $faker = Factory::create();

        $users = ScoreIq::where('status', 'lolos')->get();

        foreach ($users as $user) {
            ScorePersonal::create([
                'user_id'=>$user->user_id,
                'stage_id'=>$user->stage_id,
                'academy_year_id'=>$faker->randomElement([1,2,3,4]),
                'score_question_personal'=>rand(200,1000),
                'status'=>$faker->randomElement([null,'lolos','tidak']),
            ]);
        }
    }
}
