<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'group_id', 'lesson_from','lesson_to'];


     
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }

    public function lesson_from()
    {
        return $this->belongsTo(Lesson::class,'lesson_from');
    }
    
    public function lesson_to()
    {
        return $this->belongsTo(Lesson::class,'lesson_to');
    }
}
