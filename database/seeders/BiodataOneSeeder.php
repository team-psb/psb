<?php

namespace Database\Seeders;

use App\Models\BiodataOne;
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
        $this->command->getOutput()->progressStart(100);
        $faker=Factory::create('id_ID');

        for ($i=1 ; $i <11 ; $i++) { 
            BiodataOne::create([
                'user_id'=>$i,
                'stage_id'=>$faker->randomElement([1,2,3,4]),
                'academy_year_id'=>$faker->randomElement([1,2,3,4]),
                'name'=>$faker->name('male'),
                'family'=>$faker->randomElement(['sangat-mampu', 'mampu', 'tidak-mampu']),
                'age'=>rand(16,21),
                'birth_date'=>$faker->date('Y-m-d','2005-12-01'),
                'no_wa'=>$faker->e164PhoneNumber,
                'gender'=>'l'
            ]);
        $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
