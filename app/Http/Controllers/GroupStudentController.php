<?php

namespace App\Http\Controllers;

use App\DataTables\GroupStudentDataTable;
use App\Models\GroupStudent;
use App\Http\Requests\GroupStudent\StoreGroupStudentRequest;
use App\Services\Group\GroupService;
use App\Services\GroupStudent\GroupStudentService;
use App\Services\Student\StudentService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GroupStudentController extends Controller
{

    private $groupStudentService;
    private $groupService;
    private $StudentService;

    public function __construct(
        GroupStudentService $groupStudentService,
        GroupService $groupService,
        StudentService $StudentService,
    ) {
        $this->groupStudentService = $groupStudentService;
        $this->groupService = $groupService;
        $this->StudentService = $StudentService;
    }

    public function index(GroupStudentDataTable $GroupStudentDataTable)
    {
        return $GroupStudentDataTable->render('pages.groupStudent.index', [
            'groups' => $this->groupService->getAllGroups(),
            'students' => $this->StudentService->getAllStudent(),
        ]);
    }

    public function store(StoreGroupStudentRequest $request)
    {
        $this->groupStudentService->createGroupStudent($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(GroupStudent $groupStudent)
    {
        $this->groupStudentService->deleteGroupStudent($groupStudent);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }


    public function getGroupStudents(Request $request)
    {
        return response()->json([
            'groupStudents' =>  $this->groupStudentService->getGroupStudentsOfGroup($request->group_id)
        ]);
    }
}