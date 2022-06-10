<?php

namespace Database\Seeders;

use App\Models\QuestionIq;
use App\Models\QuestionIqAnswer;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QuestionIqAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionIqAnswer::truncate();
        $faker = Factory::create();

        $question_iqs = QuestionIq::pluck('id');
        $users = User::find(2);

        foreach ($question_iqs as $question) {
            QuestionIqAnswer::create([
                'user_id' => $users->id,
                'question_iq_id' => $question,
                'answer' => $faker->randomElement(['a', 'b', 'c', 'd', 'e'])
            ]);
        }
    }
}
