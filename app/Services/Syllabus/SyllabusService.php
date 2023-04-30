<?php

namespace App\Services\Syllabus;

use App\Models\syllabus;

class SyllabusService
{
    public function createSyllabus()
    {
        return syllabus::create([
            'student_lesson_id' => $student_lesson_id,
            'from_chapter' => $request->from_chapter,
            'to_chapter' => $request->to_chapter,
            'from_page' => $request->from_page,
            'to_page' => $request->to_page,
            'finished' => false
        ]);
    }
}