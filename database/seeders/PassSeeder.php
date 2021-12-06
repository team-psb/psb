<?php

namespace Database\Seeders;

use App\Models\Pass;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;

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
        $faker=Factory::create();

        $this->command->getOutput()->progressStart('100');
        $user=User::all()->pluck('id');
        $user_id=$user->toArray();

        for ($i=1; $i <11 ; $i++) { 
            Pass::create([
                'user_id'=>$i,
                'academy_year_id'=>$faker->randomElement([1,2,3,4]),
                'status'=>null
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
