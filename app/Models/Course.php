<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentCourse;
class Course extends Model
{
    use HasFactory;

    public function studentscourse()
    {
        return $this->hasMany(StudentCourse::class,'student_id','course_id');
    }
}
