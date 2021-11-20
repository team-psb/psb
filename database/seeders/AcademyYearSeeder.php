<?php

namespace Database\Seeders;

use App\Models\AcademyYear;
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

        AcademyYear::create([
            'year'=>'2022',
            'stage_id'=>'1',
            'is_active'=>'0',
        ]);

        AcademyYear::create([
            'year'=>'2022',
            'stage_id'=>'2',
            'is_active'=>'0',
        ]);

        AcademyYear::create([
            'year'=>'2023',
            'stage_id'=>'3',
            'is_active'=>'0',
        ]);

        AcademyYear::create([
            'year'=>'2023',
            'stage_id'=>'4',
            'is_active'=>'1',
        ]);
    }
}
