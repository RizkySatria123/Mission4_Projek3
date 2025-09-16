<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => 'admin123',
            'role'=>'admin',
            'full_name' => 'Administrator',
            'profile_image'=>null
        ]);
        User::create([
            'username' => 'Raihana',
            'password' => 'raihana123',
            'role'=>'student',
            'full_name' => 'Raihana Aisha Az-zahra',
            'profile_image'=>null
        ]);
    }
}
