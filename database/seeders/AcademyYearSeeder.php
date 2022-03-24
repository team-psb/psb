<?php

namespace Database\Seeders;

use App\Models\AcademyYear;
use App\Models\Stage;
use Illuminate\Database\Seeder;

class AcademyYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademyYear::truncate();

        $stages = Stage::pluck('id');

        foreach ($stages as $stage) {
            AcademyYear::create([
                'year'=>'2022',
                'stage_id'=> $stage,
                'is_active'=> true,
            ]);
        }
    }
}
