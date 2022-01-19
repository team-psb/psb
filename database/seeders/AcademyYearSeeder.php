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
            'is_active'=>'1',
        ]);
    }
}
