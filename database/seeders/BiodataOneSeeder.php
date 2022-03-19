<?php

namespace Database\Seeders;

use App\Models\AcademyYear;
use App\Models\BiodataOne;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class BiodataOneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BiodataOne::truncate();
        $faker=Factory::create('id_ID');
        // $this->command->getOutput()->progressStart(100);

        // for ($i=1 ; $i <11 ; $i++) { 
        //     BiodataOne::create([
        //         'user_id'=>$i,
        //         'stage_id'=>$faker->randomElement([1,2,3,4]),
        //         'academy_year_id'=>$faker->randomElement([1,2,3,4]),
        //         'name'=>$faker->name('male'),
        //         'family'=>$faker->randomElement(['sangat-mampu', 'mampu', 'tidak-mampu']),
        //         'age'=>rand(16,21),
        //         'birth_date'=>$faker->date('Y-m-d','2005-12-01'),
        //         'no_wa'=>$faker->e164PhoneNumber,
        //         'gender'=>'l'
        //     ]);
        // $this->command->getOutput()->progressAdvance();
        // }
        // $this->command->getOutput()->progressFinish();

        $users = User::get();
        $academy = AcademyYear::find(1);
        
        foreach ($users as $user) {
            BiodataOne::create([
                'user_id'=> $user->id,
                'stage_id'=> $academy->stage_id,
                'academy_year_id'=> $academy->id,
                'full_name'=> $faker->name('male'),
                'family'=> $faker->randomElement(['sangat-mampu', 'mampu', 'tidak-mampu']),
                'age'=> rand(16,21),
                'birth_date'=> $faker->date('Y-m-d','2005-12-01'),
                'no_wa'=> $user->phone,
                'gender'=> 'l'
            ]);
        }
    }
}
