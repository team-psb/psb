<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            VideoSeeder::class,
            StageSeeder::class,
            SchduleSeeder::class,
            BiodataOneSeeder::class,
            BiodataTwoSeeder::class,
            CategorySeeder::class,
            PassSeeder::class,
            QnaSeeder::class,
            QuestionIqSeeder::class,
            QuestionPersonalSeeder::class,
            ScoreSeeder::class
        ]);
    }
}