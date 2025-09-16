<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('username', 'Raihana')->first();

        Student::create([
            'USER_ID' => $user->USER_ID,
            'STUDENT_NUMBER' => 'STU2024001',
            'BIODATA' => 'Mahasiswa tahun kedua jurusan Informatika.',
            'PROFILE_IMAGE' => null,
            'ENTRY_YEAR' => 2024,
        ]);
    }
}
