<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        // $this->command->getOutput()->progressStart(8);

        $faker = Factory::create('id_ID');

        // for($i=1; $i <10; $i++){
        //     User::create([
        //         'name'=>$faker->name('male'),
        //         'phone'=>$faker->e164PhoneNumber,
        //         'password'=>bcrypt('12344321'),
        //         'role'=>'pendaftar'
        //     ]);
        //     $this->command->getOutput()->progressAdvance();
        // }
        // $this->command->getOutput()->progressFinish();

        User::create([
            'name'=>'admin',
            'phone'=>'0123456789',
            'password'=>bcrypt('pondok123'),
            'role'=>'admin'
        ]);

        // for ($i=0; $i < 500; $i++) { 
        //     User::create([
        //         'name'=>'pendaftar'.$i,
        //         'phone'=>'9876543210'.$i,
        //         'password'=>bcrypt('123456'),
        //         'role'=>'pendaftar',
        //         'created_at' => $faker->dateTime('now', null)
        //     ]);
        // }
    }
}
