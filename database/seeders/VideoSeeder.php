<?php

namespace Database\Seeders;

use App\Models\BiodataTwo;
use App\Models\ScorePersonal;
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

        $users = ScorePersonal::where('status', 'lolos')->get();

        foreach ($users as $user) {
            Video::create([
                'user_id'=> $user->user_id,
                'stage_id' => $user->stage_id,
                'academy_year_id'=>$faker->randomElement([1,2,3,4]),
                'url' => $faker->url,
                'status'=>$faker->randomElement([null,'lolos','tidak']),
            ]);
        }
    }
}
