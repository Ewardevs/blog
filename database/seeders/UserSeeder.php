<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=> "Ewardevs",
            "email"=> "alexanderovelar4@gmail.com",
            "password"=> bcrypt("12345678"),
        ])->assignRole('admin');
        User::factory(20)->create();

    }
}
