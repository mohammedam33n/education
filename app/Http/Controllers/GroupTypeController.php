<?php

namespace App\Http\Controllers;

use App\Models\GroupType;
use App\DataTables\GroupTypeDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\GroupType\GroupTypeService;
use App\Http\Requests\GroupType\StoreGroupTypeRequest;
use App\Http\Requests\GroupType\UpdateGroupTypeRequest;

class GroupTypeController extends Controller
{

    private $groupTypeDataTable;
    private $groupTypeService;

    public function __construct(
        GroupTypeDataTable $groupTypeDataTable,
        GroupTypeService $groupTypeService
    ) {
        $this->groupTypeDataTable = $groupTypeDataTable;
        $this->groupTypeService   = $groupTypeService;
    }

    public function index()
    {
        return $this->groupTypeDataTable->render('pages.groupType.index');
    }

    public function create()
    {
        return view('pages.groupType.create');
    }

    public function store(StoreGroupTypeRequest $request)
    {
        $this->groupTypeService->createGroupType($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group_types.index'));
    }


    public function show(GroupType $groupType)
    {
        //
    }

    public function edit(GroupType $group_type)
    {
        return view('pages.groupType.edit', [
            "group_type" => $group_type
        ]);
    }

    public function update(UpdateGroupTypeRequest $request, GroupType $group_type)
    {
        $this->groupTypeService->updateGroupType($group_type, $request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group_types.index'));
    }


    public function delete(GroupType $group_type)
    {
        $this->groupTypeService->deleteGroupType($group_type);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}
