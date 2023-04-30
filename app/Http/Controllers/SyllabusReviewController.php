<?php

namespace App\Http\Controllers;

use App\Http\Requests\SyllabusReview\CreateNewLessonReviewRequest;
use App\Models\StudentLesson;
use App\Models\StudentLessonReview;
use App\Models\SyllabusReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyllabusReviewController extends Controller
{
    public function createNewLessonAjax(CreateNewLessonReviewRequest $request)
    {
        $syllabusReview = DB::transaction(function() use ($request){
            $studentLesson = StudentLesson::firstOrCreate([
                'group_id' => $request->group_id,
                'lesson_id' => $request->lesson_id,
                'student_id' => $request->student_id
            ],[
                
            ]);
    
            $studentLessonReview = StudentLessonReview::firstOrCreate([
                'student_lesson_id' => $studentLesson->id
            ],[
    
            ]);
    
            return SyllabusReview::create([
                'student_lesson_review_id' => $studentLessonReview->id,
                'from_chapter' => $request->from_chapter,
                'to_chapter' => $request->to_chapter,
                'from_page' => $request->from_page,
                'to_page' => $request->to_page,
                'finished' => false,
                'rate' => null,
            ]);
        });

        return response()->json([
            'status' => 200,
            'syllabusReview' => $syllabusReview
        ]);
    }

    public function finishNewLessonReviewAjax(Request $request, SyllabusReview $syllabusReview)
    {
        // if($syllabusReview->finished == true)
        // {
        //     return response()->json([
        //         'status' => 400,
        //     ]);
        // }

        $syllabusReview->update([
            'finished' => true,
            'rate' => $request->rate
        ]);

        $studentLessonReview = $syllabusReview->studentLessonReview;
        $lesson = $studentLessonReview->studentLesson->lesson;

        $percentage = $lesson->chapters_count > 0 ? (($syllabusReview->to_chapter / $lesson->chapters_count) * 100) : 0;

        $studentLessonReview->update([
            'last_page_finished' => $syllabusReview->to_page,
            'last_chapter_finished' => $syllabusReview->to_chapter,
            'percentage' => round($percentage, 2),
            'finished' => $syllabusReview->to_chapter == $lesson->chapters_count ? true : false
        ]);

        return response()->json([
            'status' => 200,
            'studentLessonReview' => $studentLessonReview,
            'syllabusReview' => $syllabusReview
        ]);
    }
}
