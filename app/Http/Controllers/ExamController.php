<?php

namespace App\Http\Controllers;

use App\DataTables\ExamDataTable;
use App\Models\Exam;
use App\Http\Requests\Exam\StoreExamRequest;
use App\Http\Requests\Exam\UpdateExamRequest;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;

class ExamController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExamDataTable $examDataTable)
    {
        return $examDataTable->render('pages.exam.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::select(['id', 'name'])->get();
        $groups = Group::select(['id', 'from', 'to'])->get();
        $lessons = Lesson::select(['id', 'title'])->get();

        return view('pages.exam.create', [
            'students' => $students,
            'groups' => $groups,
            'lessons' => $lessons,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        Exam::create([
            'student_id' => $request->student_id,
            'group_id' => $request->group_id,
            'lesson_from' => $request->lesson_from,
            'lesson_to' => $request->lesson_to,
        ]);

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.exam.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {

        $students = Student::select(['id', 'name'])->get();
        $groups = Group::select(['id', 'from', 'to'])->get();
        $lessons = Lesson::select(['id', 'title'])->get();

        return view('pages.exam.edit', [
            'exam' => $exam,
            'students'  => $students,
            'groups'  => $groups,
            'lessons'  => $lessons,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $exam->update([
            'student_id' => $request->student_id,
            'group_id' => $request->group_id,
            'lesson_from' => $request->lesson_from,
            'lesson_to' => $request->lesson_to,

        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.exam.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function delete(Exam $exam)
    {
        $exam->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}