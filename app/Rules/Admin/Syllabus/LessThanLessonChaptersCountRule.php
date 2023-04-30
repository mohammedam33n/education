<?php

namespace App\Rules\Admin\Syllabus;

use App\Models\StudentLesson;
use Illuminate\Contracts\Validation\Rule;

class LessThanLessonChaptersCountRule implements Rule
{

    private $studentLesson;
    private $message = '';
   
    public function __construct(StudentLesson $studentLesson)
    {
        $this->studentLesson = $studentLesson;
    }

    public function passes($attribute, $value)
    {
        if($value > ($this->studentLesson->lesson->chapters_count ?? 0))
        {
            $this->message = "The $attribute Should Be Less Than " . $this->studentLesson->lesson->chapters_count;
            return false;
        }
        return true;
    }

    public function message()
    {
        return $this->message;
    }
}
