<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stage::truncate();

        Stage::create([
            'name' => 'gel-1'
        ]);
        Stage::create([
            'name' => 'gel-2'
        ]);
        Stage::create([
            'name' => 'gel-3'
        ]);
        Stage::create([
            'name' => 'gel-4'
        ]);
    }
}
