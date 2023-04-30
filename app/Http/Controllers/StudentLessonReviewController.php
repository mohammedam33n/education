<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentLesson;
use App\Models\StudentLessonReview;
use App\Http\Requests\StudentLesson\StudentLessonReviewRequest;

class StudentLessonReviewController extends Controller
{
    public function ajaxStudentLessonFinishedReview(StudentLessonReviewRequest $request)
    {

        dd($request->all());
        $studentLesson = StudentLesson::firstOrCreate([
            'group_id' => $request->group_id,
            'lesson_id' => $request->lesson_id,
            'student_id' => $request->student_id
        ],[

        ]);

        //C:\Users\moham\OneDrive\Desktop\project\Emad\aisha2\app\Http\Controllers\StudentLessonReviewController.php

        if($request->finished == "true")
        {
            StudentLessonReview::updateOrCreate([
                'student_lesson_id' => $studentLesson->id
            ], [
                'finished' => true,
                'percentage' => 100,
                'last_chapter_finished' => $request->chapters_count,
                'last_page_finished' => $request->last_page_finished,
            ]);
        }
        else
        {
            StudentLessonReview::updateOrCreate([
                'student_lesson_id' => $studentLesson->id
            ], [
                'finished' => false,
            ]);
        }



        return response()->json([
            'status' => 200
        ]);
    }
}
