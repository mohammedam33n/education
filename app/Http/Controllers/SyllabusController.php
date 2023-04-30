<?php

namespace App\Http\Controllers;

use App\Http\Requests\syllabus\CreateNewLessonRequest;
use App\Models\syllabus;
use App\Http\Requests\syllabus\StoresyllabusRequest;
use App\Http\Requests\syllabus\UpdatesyllabusRequest;
use App\Models\StudentLesson;
use App\Services\StudentLesson\StudentLessonService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SyllabusController extends Controller
{
    private $studentLessonService;

    public function __construct(StudentLessonService $studentLessonService)
    {
        $this->studentLessonService = $studentLessonService;    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresyllabusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresyllabusRequest $request)
    {
        syllabus::create([
            'student_id' => $request->student_id,
            'new_lesson' => $request->new_lesson,
            'old_lesson' => $request->old_lesson,
            'is_reverse' => $request->is_reverse,

        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(syllabus $syllabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(syllabus $syllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesyllabusRequest  $request
     * @param  \App\Models\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesyllabusRequest $request, syllabus $syllabus)
    {
        $syllabus->update([
            'student_id' => $request->student_id,
            'new_lesson' => $request->new_lesson,
            'old_lesson' => $request->old_lesson,
            'is_reverse' => $request->is_reverse,
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function delete(syllabus $syllabus)
    {
        $syllabus->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function createNewLesson(CreateNewLessonRequest $request)
    {
        $student_lesson_id = $request->student_lesson_id;
        if( !$request->student_lesson_id )
        {
            $studentLesson = $this->studentLessonService->createNewLesson($request);

            $student_lesson_id = $studentLesson->id;
        }

        if(syllabus::where([
            ['student_lesson_id' , $student_lesson_id],
            ['finished' , false]
        ])->exists())
        {
            return response()->json([
                'status' => 400,
            ]);
        }

        $syllabi = syllabus::create([
            'student_lesson_id' => $student_lesson_id,
            'from_chapter' => $request->from_chapter,
            'to_chapter' => $request->to_chapter,
            'from_page' => $request->from_page,
            'to_page' => $request->to_page,
            'finished' => false
        ]);
        
        return response()->json([
            'status' => 200,
            'syllabi' => $syllabi
        ]);
    }

    public function finishNewLessonAjax(Request $request, syllabus $syllabus)
    {
        if($syllabus->finished == true)
        {
            return response()->json([
                'status' => 400,
            ]);
        }

        $syllabus->update([
            'finished' => true,
            'rate' => $request->rate
        ]);

        $studentLesson = $syllabus->studentLesson;
        $lesson = $studentLesson->lesson;

        $percentage = ($syllabus->to_chapter / $lesson->chapters_count) * 100;

        $studentLesson->update([
            'last_page_finished' => $syllabus->to_page,
            'last_chapter_finished' => $syllabus->to_chapter,
            'percentage' => round($percentage, 2),
            'finished' => $syllabus->to_chapter == $lesson->chapters_count ? true : false
        ]);

        return response()->json([
            'status' => 200,
            'studentLesson' => $studentLesson,
            'syllabus' => $syllabus
        ]);
    }
}