<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    use ImageTrait;

    public function index(StudentDataTable $studentDataTable)
    {
        return $studentDataTable->render('pages.student.index');
    }

    public function store(StoreStudentRequest $request)
    {
        $fileName = $this->uploadImage(
            imageObject: $request->file('avatar'),
            path: Student::AVATARS_PATH
        );

        Student::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'qualification' => $request->qualification,
            'avatar' => $fileName,

        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function show(Student $student)
    {
        $subjects = Subject::with('lessons')->get();
        $student->load([
            'groupStudents' => function ($q) {
                $q->with('group.studentLessons');
            }
        ]);

        return view('pages.student.show', [
            'student' => $student,
            'subjects' => $subjects,
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $fileName = $student->getRawOriginal('avatar');

        if ($request->file('avatar')) {

            $this->deleteImage(
                path: $student->getAvatarPath()
            );

            $fileName = $this->uploadImage(
                imageObject: $request->file('avatar'),
                path: Student::AVATARS_PATH
            );
        }

        $student->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'qualification' => $request->qualification,
            'avatar' => $fileName,

        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Student $student)
    {
        $this->deleteImage(
            path: $student->getAvatarPath()
        );

        $student->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getGroupStudents(Student $student)
    {
        $subjects = Subject::with([
            'lessons.studentLessons.syllabus',
            'lessons.studentLessons.studentLessonReview.syllabusReviews',
        ])->get();

        return response()->json([
            'groupStudents' => $student->groupStudents->load(['group.groupDays']),
            'subjects' => $subjects,
        ]);
    }
}