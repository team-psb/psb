<?php

namespace Database\Seeders;

use App\Models\AcademyYear;
use App\Models\BiodataTwo;
use App\Models\IndonesiaCity;
use App\Models\IndonesiaProvince;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class BiodataTwoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BiodataTwo::truncate();
        // $this->command->getOutput()->progressStart(200);

        $faker=Factory::create('id_ID');
        $province = IndonesiaProvince::find(1);
        $city = IndonesiaCity::where('province_code', $province->code)->find(1);
        // $kota_id= $kota->toArray();

        // for ($i=1; $i <11 ; $i++) { 
        //     BiodataTwo::create([
        //         'user_id'=>$i,
        //         'stage_id'=>$faker->randomElement([1,2,3,4]),
        //         'academy_year_id'=>$faker->randomElement([1,2,3,4]),
        //         'birth_place'=>$faker->city,
        //         'address'=>$faker->address,
        //         'indonesia_provinces_id'=>rand(11,94),
        //         'indonesia_cities_id'=>rand(11,132),
        //         'facebook'=>$faker->url,
        //         'instagram'=>$faker->url,
        //         'last_education'=>$faker->randomElement(['SMP','SMA']),
        //         'name_school'=>$faker->citySuffix,
        //         'major'=>$faker->randomElement(['IPA','IPS','BAHASA','AGAMA','TIK','TKJ','RPL','FARMASI','AKUNTANSI','LAINNYA']),
        //         'organization'=>$faker->randomElement(['osis','pramuka','rohis','pmr','lainnya']),
        //         'achievment'=>$faker->sentence(6,true),
        //         'hobby'=>$faker->randomElement(['Baca','Renang','Sepak Bola','Traveling','Rebahan','Makan','Sepeda','Naik Gunung','Lain Lain']),
        //         'goal'=>$faker->word(3,false),
        //         'skill'=>$faker->word(3,false),
        //         'memorization'=>rand(1,30),
        //         'figure_idol'=>$faker->name('male'),
        //         'chaplain_idol'=>$faker->name('male'),
        //         'tauhid'=>'...',
        //         'study_islamic'=>$faker->word(3,false),
        //         'read_book'=>$faker->sentence(3,true),
        //         'smoker'=>$faker->randomElement(['iya','tidak']),
        //         'tattoed'=>$faker->randomElement(['iya','tidak']),
        //         'pray'=>$faker->randomElement(['bangun-sendiri','dibangunkan']),
        //         'girlfriend'=>$faker->randomElement(['iya','tidak']),
        //         'gamer'=>$faker->randomElement(['iya','tidak']),
        //         'game_name'=>$faker->sentence(6,true),
        //         'game_duration'=>rand(1,24),
        //         'reason_registration'=>$faker->sentence(30,true),
        //         'activity'=>$faker->sentence(30,true),
        //         'personal'=>$faker->sentence(30,true),
        //         'parent'=>$faker->randomElement(['lengkap','bapak','ibu','yatim-piatu']),
        //         'father'=>$faker->name('male'),
        //         'father_work'=>$faker->jobTitle,
        //         'mother'=>$faker->name('female'),
        //         'mother_work'=>$faker->jobTitle,
        //         'parent_income'=>rand(500000,4000000),
        //         'child_to'=>rand(1,12),
        //         'brother'=>rand(1,12),
        //         'choose_guardian' => $faker->randomElement(['ayah', 'ibu', 'selain-orang-tua', 'tidak-ada']),
        //         'no_guardian'=>$faker->e164PhoneNumber,
        //         'description_guardian'=>$faker->sentence(20,true),
        //         'permission_parent'=>$faker->randomElement(['iya','tidak']),
        //         'have_laptop'=>$faker->randomElement(['iya','tidak']),
        //         'agree'=>1,
        //         'status'=>null,
        //     ]);
        // $this->command->getOutput()->progressAdvance();
        // }
        // $this->command->getOutput()->progressFinish();

        $users = User::get();
        $academy = AcademyYear::find(1);

        foreach ($users as $user) {
            BiodataTwo::create([
                'user_id'=> $user->id,
                'stage_id'=> $academy->stage_id,
                'academy_year_id'=> $academy->id,
                'indonesia_provinces_id'=> $province->code,
                'indonesia_cities_id'=> $city->id,
                'birth_place'=> $faker->city,
                'address'=> $faker->address,
                'facebook'=> $faker->url,
                'instagram'=> $faker->url,
                'tiktok'=> $faker->url,
                'last_education'=> $faker->randomElement(['SMP','SMA']),
                'name_school'=> $faker->citySuffix,
                'major'=> $faker->randomElement(['IPA','IPS','BAHASA','AGAMA','TIK','TKJ','RPL','FARMASI','AKUNTANSI','LAINNYA']),
                'organization'=> $faker->randomElement(['osis','pramuka','rohis','pmr','lainnya']),
                'achievment'=> $faker->sentence(6,true),
                'hobby'=> $faker->randomElement(['Baca','Renang','Sepak Bola','Traveling','Rebahan','Makan','Sepeda','Naik Gunung','Lain Lain']),
                'goal'=> $faker->word(3,false),
                'skill'=> $faker->word(3,false),
                'memorization'=> rand(1,30),
                'figure_idol'=> $faker->name('male'),
                'chaplain_idol'=> $faker->name('male'),
                'tauhid'=> '...',
                'study_islamic'=> $faker->word(3,false),
                'read_book'=> $faker->sentence(3,true),
                'smoker'=> $faker->randomElement(['iya','tidak']),
                'tattoed'=> $faker->randomElement(['iya','tidak']),
                'pray'=> $faker->randomElement(['bangun-sendiri','dibangunkan']),
                'girlfriend'=> $faker->randomElement(['iya','tidak']),
                'gamer'=> $faker->randomElement(['iya','tidak']),
                'game_name'=> $faker->sentence(6,true),
                'game_duration'=> rand(1,24),
                'reason_registration'=> $faker->sentence(30,true),
                'activity'=> $faker->sentence(30,true),
                'personal'=> $faker->sentence(30,true),
                'parent'=> $faker->randomElement(['lengkap','ayah','ibu','yatim-piatu']),
                'father'=> $faker->name('male'),
                'father_work'=> $faker->jobTitle,
                'father_id'=> rand(500000,4000000),
                'mother'=> $faker->name('female'),
                'mother_work'=> $faker->jobTitle,
                'mother_id'=> rand(500000,4000000),
                'parent_income'=> rand(500000,4000000),
                'child_to'=> rand(1,12),
                'brother'=> rand(1,12),
                'choose_guardian' => $faker->randomElement(['ayah', 'ibu', 'selain-orang-tua', 'tidak-ada']),
                'no_guardian'=> $faker->e164PhoneNumber,
                'description_guardian'=> $faker->sentence(20,true),
                'permission_parent'=> $faker->randomElement(['iya','tidak']),
                'have_laptop'=> $faker->randomElement(['iya','tidak']),
                'agree'=>1,
                'status'=>null,
            ]);
        }
    }
}
