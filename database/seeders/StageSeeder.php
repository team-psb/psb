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

        for ($i=1; $i < 5; $i++) {
            Stage::create([
                'name' => 'gel-'.$i
            ]);
        }
    }
}
