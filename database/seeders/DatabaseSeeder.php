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
            ProvincesSeeder::class,
            CitiesSeeder::class,
            StageSeeder::class,
            AcademyYearSeeder::class,
            UserSeeder::class,
            SchduleSeeder::class,
            // BiodataOneSeeder::class,
            // BiodataTwoSeeder::class,
            // ScoreIqSeeder::class,
            // ScorePersonalSeeder::class,
            // VideoSeeder::class,
            // PassSeeder::class,
            QnaSeeder::class,
            QuestionIqSeeder::class,
            QuestionPersonalSeeder::class,
            SettingSeeder::class
        ]);

    }
}
