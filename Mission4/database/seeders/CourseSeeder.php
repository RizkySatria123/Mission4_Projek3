<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'COURSE_CODE' => 'CS101',
            'COURSE_NAME' => 'Pengantar Informatika',
            'DESCRIPTION' => 'Mata kuliah pengenalan dasar ilmu komputer.',
            'CREDITS' => 3,
            'IMAGE' => null,
        ]);

        Course::create([
            'COURSE_CODE' => 'CS102',
            'COURSE_NAME' => 'Algoritma dan Pemrograman',
            'DESCRIPTION' => 'Mata kuliah dasar algoritma dan pemrograman dengan C.',
            'CREDITS' => 4,
            'IMAGE' => null,
        ]);
    }
}
