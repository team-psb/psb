<?php

namespace Database\Seeders;

use App\Models\QuestionPersonal;
use App\Models\QuestionPersonalAnswer;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QuestionPersonalAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionPersonalAnswer::truncate();
        $faker = Factory::create();

        $question_iqs = QuestionPersonal::pluck('id');
        $users = User::find(2);

        foreach ($question_iqs as $question) {
            QuestionPersonalAnswer::create([
                'user_id' => $users->id,
                'question_personal_id' => $question,
                'answer' => $faker->randomElement(['a', 'b', 'c', 'd', 'e'])
            ]);
        }
    }
}
