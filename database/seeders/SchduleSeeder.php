<?php

namespace Database\Seeders;

use App\Models\Schdule;
use Illuminate\Database\Seeder;
use Faker\Factory;

class SchduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schdule::truncate();

        $faker=Factory::create('id_ID');

        for ($i=1 ; $i <20 ; $i++) { 
            Schdule::create([
                'image'=>$faker->randomElement(['img/banner-pondok.jpg','img/banner-pondok1.jpg','img/banner-pondok2.jpg']),
                'title'=>$faker->sentence(4,true),
                'video'=>$faker->url,
                'content'=>$faker->paragraphs(6,true)
            ]);
        }
    }
}
