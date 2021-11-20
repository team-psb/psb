<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Score::truncate();
        $faker=Factory::create();

        $this->command->getOutput()->progressStart(200);
        for ($i=2; $i <202 ; $i++) { 
            Score::create([
                'user_id'=>$i,
                'academy_year_id'=>$faker->randomElement([1,2,3,4]),
                'score_question_iq'=>rand(30,95),
                'score_question_personal'=>rand(200,1000),
                'status'=>null,
            ]);
        $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
