<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Qna;
use Faker\Factory;

class QnaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Qna::truncate();
        $faker=Factory::create('id_ID');

        for ($i=0; $i <20 ; $i++) { 
            Qna::create([
                'question'=>$faker->sentences(3,true),
                'answer'=>$faker->paragraphs(3,true)
            ]);
        }
    }
}
