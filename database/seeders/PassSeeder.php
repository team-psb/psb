<?php

namespace Database\Seeders;

use App\Models\Pass;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Video;

class PassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pass::truncate();
        $faker = Factory::create();

        $users = Video::where('status', 'lolos')->get();

        foreach ($users as $user) {
            Pass::create([
                'user_id'=> $user->user_id,
                'stage_id' => $user->stage_id,
                'academy_year_id'=>$faker->randomElement([1,2,3,4]),
                'status'=>$faker->randomElement([null,'lolos','tidak'])
            ]);
        }
    }
}
