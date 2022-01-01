<?php

namespace Database\Seeders;

use App\Models\Setting;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            AcademyYearSeeder::class,
            UserSeeder::class,
            // VideoSeeder::class,
            StageSeeder::class,
            SchduleSeeder::class,
            // BiodataOneSeeder::class,
            // BiodataTwoSeeder::class,
            // PassSeeder::class,
            QnaSeeder::class,
            QuestionIqSeeder::class,
            QuestionPersonalSeeder::class,
            // ScoreSeeder::class,
            ProvincesSeeder::class,
            CitiesSeeder::class
        ]);

        Setting::create([
            'academy_year_id' => null,
            'stage_id' => null,
            'question_iq_value' => 50,
            'question_personal_value' => 50,
            'notification' => null
        ]);
    }
}
