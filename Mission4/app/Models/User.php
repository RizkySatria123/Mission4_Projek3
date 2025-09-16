<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'USERS';
    protected $primaryKey = 'USER_ID';

    public $timestamps = true;

    protected $fillable = [
        'USERNAME',
        'PASSWORD',
        'ROLE',
        'FULL_NAME',
        'PROFILE_IMAGE',
        'STUDENT_NUMBER',  
        'ENTRY_YEAR',      
    ];


    protected $hidden = [
        'PASSWORD',
    ];

    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }

    // Method untuk mengatur username
    public function getAuthIdentifierName()
    {
        return 'USERNAME';
    }

    // Method untuk mengatur password
    public function setPASSWORDAttribute($value)
    {
        if ($value && Hash::needsRehash($value)) {
            $this->attributes['PASSWORD'] = Hash::make($value);
        } else {
            $this->attributes['PASSWORD'] = $value;
        }
    }

    // Method untuk memeriksa apakah pengguna adalah admin
    public function isAdmin()
    {
        return $this->ROLE === 'admin';
    }

    // Relasi ke student
    public function student()
    {
        return $this->hasOne(Student::class, 'USER_ID', 'USER_ID');
    }

    // Relasi ke takes via student
    public function takes()
    {
        return $this->hasManyThrough(
            Take::class,
            Student::class,
            'USER_ID',      
            'STUDENT_ID',   
            'USER_ID',      
            'STUDENT_ID'    
        );
    }

    // Courses lewat student
    public function courses()
    {
        return $this->takes()->with('course');
    }

}