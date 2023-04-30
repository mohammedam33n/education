<?php

namespace App\Http\Controllers;

use App\DataTables\TeacherDataTable;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Models\Teacher;
use App\Services\Experience\ExperienceService;
use App\Services\Teacher\TeacherService;
use Illuminate\Http\JsonResponse;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{


    // use GroupTrait;

    private $teacherDataTable;
    private $teacherService;
    private $experienceService;

    public function __construct(
        TeacherDataTable  $teacherDataTable,
        TeacherService    $teacherService,
        ExperienceService $experienceService
    )
    {
        $this->teacherDataTable = $teacherDataTable;
        $this->teacherService = $teacherService;
        $this->experienceService = $experienceService;
    }

    public function index()
    {
        return $this->teacherDataTable->render('pages.teacher.index');
    }

    public function show(Teacher $teacher)
    {
        $this->teacherService->setAllDataAboutTeacher($teacher);

        return view('pages.teacher.show', [
            'teacher' => $teacher,
            'experiences' => $this->teacherService->getTeacherExperiences($teacher),
            'groups' => $this->teacherService->getAllTeacherGroups($teacher),
            'countGroups' => $this->teacherService->getCountOfGroups($teacher),
            'countStudent' => $this->teacherService->getCountOfStudents($teacher)
        ]);
    }

    public function store(StoreTeacherRequest $request)
    {
        $this->teacherService->createTeacher($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $this->teacherService->updateTeacher($teacher, $request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Teacher $teacher)
    {
        $this->teacherService->deleteTeacher($teacher);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getTeacherShowDataAjax(Teacher $teacher): JsonResponse
    {
        $this->teacherService->setAllDataAboutTeacher($teacher);

        $experiences = $this->teacherService->getTeacherExperiences($teacher);

        $yearsOfExperience = $this->experienceService->getCountOfExperienceYears($experiences);

        return response()->json([
            'statistics' => [
                [
                    'name' => 'Groups Count',
                    'value' => $this->teacherService->getCountOfGroups($teacher)
                ],
                [
                    'name' => 'Student Count',
                    'value' => $this->teacherService->getCountOfStudents($teacher)
                ],
                [
                    'name' => 'Total Experience',
                    'value' => $yearsOfExperience . " Years"
                ],
            ],
            'teacher' => $teacher,

            'experiences' => $this->teacherService->getTeacherExperiences($teacher),

            'groups' => $this->teacherService->getAllTeacherGroups($teacher),
        ]);
    }


}
