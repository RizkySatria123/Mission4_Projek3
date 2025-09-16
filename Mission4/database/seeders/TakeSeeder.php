<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Take;
use App\Models\Student;
use App\Models\Course;

class TakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = Student::first();
        $course = Course::where('COURSE_CODE', 'CS101')->first();

        Take::create([
            'STUDENT_ID' => $student->STUDENT_ID,
            'COURSE_ID' => $course->COURSE_ID,
            'ENROLL_DATE' => now(),
            'GRADE' => 0.00,
            'STATUS' => 'active',
        ]);
    }
}
