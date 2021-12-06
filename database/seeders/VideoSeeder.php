<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;
use Faker\Factory;
use App\Models\User;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::truncate();

        $faker=Factory::create();
        $user=User::all()->pluck('id');
        $user_id=$user->toArray();

        for ($i=1; $i <11; $i++) { 
            Video::create([
                'user_id'=>$i,
                'academy_year_id'=>$faker->randomElement([1,2,3,4]),
                'url'=>$faker->url
            ]);
        }
    }
}
