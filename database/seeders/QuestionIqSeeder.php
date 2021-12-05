<?php

namespace Database\Seeders;

use App\Models\QuestionIq;
use Illuminate\Database\Seeder;
use Faker\Factory;

class QuestionIqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionIq::truncate();
        $faker = Factory::create();

        $this->command->getOutput()->progressStart(200);
        for ($i=0; $i <60 ; $i++) { 
            QuestionIq::create([
                'question' =>$faker->paragraphs(rand(1,3),true),
                'image'=>$faker->randomElement(['img/pict1.jpg','img/pict2.png','img/pict3.jpeg']),
                'a'=>$faker->sentences(rand(1,3),true),
                'b'=>$faker->sentences(rand(1,3),true),
                'c'=>$faker->sentences(rand(1,3),true),
                'd'=>$faker->sentences(rand(1,3),true),
                'e'=>$faker->sentences(rand(1,3),true),
                'answer_key'=>$faker->randomElement(['a', 'b', 'c', 'd', 'e']),
                ]);
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
    }
}
