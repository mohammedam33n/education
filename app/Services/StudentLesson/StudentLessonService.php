<?php

namespace App\Services\StudentLesson;

use App\Models\StudentLesson;

class StudentLessonService
{
    private $student_id;
    private $lesson_id;
    private $group_id;

    public function store($request)
    {
        $this->setStudentId($request->student_id);
        $this->setLessonId($request->lesson_id);
        $this->setGroupId($request->group_id);

        if ($request->max_chapters == $request->chapters_count) {
            $this->updateOrCreateStudentLesson([
                'finished' => true,
                'percentage' => 100,
                'last_chapter_finished' => $request->chapters_count,
                'last_page_finished' => $request->last_page_finished,
            ]);
        } else {
            $parcentage = ($request->chapters_count / $request->max_chapters) * 100;
            $this->updateOrCreateStudentLesson([
                'finished' => false,
                'percentage' => round($parcentage, 2),
                'last_chapter_finished' => $request->chapters_count,
                'last_page_finished' => $request->last_page_finished,
            ]);
        }
    }

    public function ajaxStudentLessonFinished($request)
    {
        $this->setStudentId($request->student_id);
        $this->setLessonId($request->lesson_id);
        $this->setGroupId($request->group_id);

        if ($request->finished == "true") {
            $this->updateOrCreateStudentLesson([
                'finished' => true,
                'percentage' => 100,
                'last_chapter_finished' => intval($request->chapters_count),
                'last_page_finished' => intval($request->last_page_finished),
            ]);
        } else {
            $this->updateOrCreateStudentLesson([
                'finished' => false,
            ]);
        }
    }

    public function createNewLesson($request)
    {
        $this->setStudentId($request->student_id);
        $this->setLessonId($request->lesson_id);
        $this->setGroupId($request->group_id);

        return $this->updateOrCreateStudentLesson([
            'finished' => false,
        ]);
    }

    private function updateOrCreateStudentLesson(array $data) : StudentLesson
    {
        return StudentLesson::updateOrCreate([
            'student_id' => $this->student_id,
            'lesson_id' => $this->lesson_id,
            'group_id' => $this->group_id,
        ], [
            'finished' => $data['finished'] ?? false,
            'percentage' => $data['percentage'] ?? 0,
            'last_chapter_finished' => $data['chapters_count'] ?? 0,
            'last_page_finished' => $data['last_page_finished'] ?? 0,
        ]);
    }

    private function setStudentId(int $student_id) : void
    {
        $this->student_id = $student_id;
    }

    private function setLessonId(int $lesson_id) : void
    {
        $this->lesson_id = $lesson_id;
    }

    private function setGroupId(int $group_id) : void
    {
        $this->group_id = $group_id;
    }
}