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

        for ($i=2; $i <202 ; $i++) { 
            BiodataOne::create([
                'user_id'=>$i,
                'academy_year_id'=>$faker->randomElement([1,2,3,4]),
                'name'=>$faker->name('male'),
                'category_id'=>$faker->randomElement([1, 2,3]),
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