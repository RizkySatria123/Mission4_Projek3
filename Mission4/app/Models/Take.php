<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Take extends Model
{
    protected $table = 'TAKES';
    protected $primaryKey = 'TAKES_ID';
    public $timestamps = true;

    protected $fillable = [
        'STUDENT_ID',
        'COURSE_ID',
        'ENROLL_DATE',
        'GRADE',
        'STATUS',
    ];

    // Relasi ke Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'STUDENT_ID', 'STUDENT_ID');
    }

    // Relasi ke Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'COURSE_ID', 'COURSE_ID');
    }
}