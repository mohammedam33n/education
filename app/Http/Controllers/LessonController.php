<?php

namespace App\Http\Controllers;

use App\DataTables\LessonsDataTable;
use App\Models\Lesson;
use App\Http\Requests\Lesson\StoreLessonRequest;
use App\Http\Requests\Lesson\UpdateLessonRequest;
use App\Models\Subject;
use RealRashid\SweetAlert\Facades\Alert;

class LessonController extends Controller
{



    public function index(LessonsDataTable $lessonsDataTable)
    {
        $subjects  = Subject::select(['id', 'name'])->get();
        return $lessonsDataTable->render('pages.lesson.index', [
            'subjects' => $subjects
        ]);
    }

    public function create()
    {
        $subjects =  Subject::get();
        return view('pages.lesson.create', [
            "subjects" => $subjects
        ]);
    }

    public function store(StoreLessonRequest $request)
    {
        Lesson::create([
            'subject_id' => $request->subject_id,
            'title' => $request->title,
            'chapters_count' => $request->chapters_count,
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function show(Lesson $lesson)
    {
        return view('pages.lesson.show', [
            "lesson" => $lesson->load(['subject','studentLessons.syllabus'])
        ]);
    }

    public function edit(Lesson $lesson)
    {
        $subjects =  Subject::get();
        return view('pages.lesson.edit', [
            "lesson" => $lesson,
            "subjects" => $subjects
        ]);
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update([
            'subject_id' => $request->subject_id,
            'title' => $request->title,
            'chapters_count' => $request->chapters_count,
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Lesson $lesson)
    {
        $lesson->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}