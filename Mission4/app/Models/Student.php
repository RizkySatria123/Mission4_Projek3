<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'STUDENTS';
    protected $primaryKey = 'STUDENT_ID';
    public $timestamps = true;
    
    protected $fillable = [
        'USER_ID',
        'STUDENT_NUMBER',
        'BIODATA',
        'PROFILE_IMAGE',
        'ENTRY_YEAR',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'USER_ID', 'USER_ID');
    }

    // Relasi ke Takes (banyak courses)
    public function takes()
    {
        return $this->hasMany(Take::class, 'STUDENT_ID', 'STUDENT_ID');
    }

    // Ambil courses yang diambil student
    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'TAKES',       
            'STUDENT_ID',  
            'COURSE_ID'    
        )->withPivot('STATUS', 'GRADE', 'ENROLL_DATE');
    }
    
}