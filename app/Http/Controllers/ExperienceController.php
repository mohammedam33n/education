<?php

namespace App\Http\Controllers;

use App\DataTables\ExperienceDataTable;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Models\Experience;
use App\Services\Experience\ExperienceService;
use App\Services\Teacher\TeacherService;
use RealRashid\SweetAlert\Facades\Alert;

class ExperienceController extends Controller
{

    private $experienceDataTable;
    private $teacherService;
    private $experienceService;

    public function __construct(
        ExperienceDataTable $experienceDataTable,
        TeacherService $teacherService,
        ExperienceService $experienceService
     )
    {
        $this->experienceDataTable = $experienceDataTable;
        $this->teacherService = $teacherService;
        $this->experienceService = $experienceService;
    }
    
    public function index()
    {
        $teachers  = $this->teacherService->getAllTeachers();

        return $this->experienceDataTable->render('pages.experience.index', [
            'teachers' => $teachers,
        ]);
    }

    public function store(StoreExperienceRequest $request)
    {
        $this->experienceService->createExperience($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $this->experienceService->updateExperience($experience, $request);
        
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Experience $experience)
    {
        $this->experienceService->deleteExperience($experience);
        
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}