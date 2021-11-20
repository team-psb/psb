<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name'=>'admin',
            'phone'=>'0123456789',
            'password'=>bcrypt('pondok123'),
            'role'=>'admin'
        ]);

        User::create([
            'name'=>'pendaftar',
            'phone'=>'9876543210',
            'password'=>bcrypt('123456'),
            'role'=>'pendaftar'
        ]);
    }
}
