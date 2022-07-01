<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongTo(course::class,'course_id');
    }

    public function student()
    {
        return $this->belongTo(Student::class,'student_id');
    
    }
}
