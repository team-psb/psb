<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create([
            'category' => 'sangat mampu'
        ]);
        Category::create([
            'category' => 'mampu'
        ]);
        Category::create([
            'category' => 'tidak mampu'
        ]);
    }
}
