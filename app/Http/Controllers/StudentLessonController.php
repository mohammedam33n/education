<?php

namespace App\Http\Controllers;

use App\Models\StudentLesson;
use App\Http\Requests\StudentLesson\StoreStudentLessonRequest;
use App\Http\Requests\StudentLesson\UpdateStudentLessonRequest;
use App\Services\StudentLesson\StudentLessonService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentLessonController extends Controller
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
     * @param  \App\Http\Requests\StoreStudentLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentLessonRequest $request)
    {
        $this->studentLessonService->store($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function ajaxStudentLessonFinished(Request $request)
    {
        $this->studentLessonService->ajaxStudentLessonFinished($request);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentLesson  $studentLesson
     * @return \Illuminate\Http\Response
     */
    public function show(StudentLesson $studentLesson)
    {
        $studentLesson->load(['syllabus', 'lesson.subject', 'student',  'studentLessonReview.syllabusReviews']);

        $studentLessonReview = $studentLesson->studentLessonReview;

        return view('pages.studentLesson.show', [
            'studentLesson' => $studentLesson,
            'studentLessonReview' => $studentLessonReview
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentLesson  $studentLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentLesson $studentLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentLessonRequest  $request
     * @param  \App\Models\StudentLesson  $studentLesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentLessonRequest $request, StudentLesson $studentLesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentLesson  $studentLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentLesson $studentLesson)
    {
        //
    }
}