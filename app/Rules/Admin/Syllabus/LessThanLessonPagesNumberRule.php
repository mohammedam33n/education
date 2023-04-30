<?php

namespace App\Rules\Admin\Syllabus;

use App\Models\StudentLesson;
use Illuminate\Contracts\Validation\Rule;

class LessThanLessonPagesNumberRule implements Rule
{

    private $studentLesson;
    private $message = '';

    public function __construct(StudentLesson $studentLesson)
    {
        $this->studentLesson = $studentLesson;
    }

    public function passes($attribute, $value)
    {
        if($this->lessThanLessonPages($value))
        {
            $this->message = "The $attribute Should Be Greater Than " . $this->studentLesson->lesson->from_page;
            return false;
        }
        else if($this->greaterThanLessonPages($value))
        {
            $this->message = "The $attribute Should Be Less Than " . $this->studentLesson->lesson->to_page;
            return false;
        }
        return true;
    }

    private function lessThanLessonPages($value)
    {
        return $value < $this->studentLesson->lesson->from_page;
    }

    private function greaterThanLessonPages($value)
    {
        return $value > $this->studentLesson->lesson->to_page;
    }

    public function message()
    {
        return $this->message;
    }
}
