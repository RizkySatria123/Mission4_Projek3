<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = 'COURSES';
    protected $primaryKey = 'COURSE_ID';
    public $timestamps = true;

    protected $fillable = [
        'COURSE_CODE',
        'COURSE_NAME',
        'DESCRIPTION',
        'CREDITS',
        'IMAGE',
    ];

    // Relasi ke Takes
    public function takes()
    {
        return $this->hasMany(Take::class, 'COURSE_ID', 'COURSE_ID');
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'TAKES',
            'COURSE_ID',    
            'STUDENT_ID'     
        );
    }
    
}