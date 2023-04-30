<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'title', 'chapters_count', 'from_page', 'to_page'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function studentLessons()
    {
        return $this->hasMany(StudentLesson::class, 'lesson_id');
    }
}