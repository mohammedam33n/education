<?php

namespace App\Services\Group;

use App\Models\Group;

class GroupService
{
    private $groupWithAllData;

    public function getAllGroups()
    {
        return  Group::get();
    }

    public function createGroup(object $request)
    {
        return Group::create([
            'name' => $request->name,
            'from' => $request->from,
            'to' => $request->to,
            'teacher_id' => $request->teacher_id,
            'group_type_id' => $request->group_type_id,
            'age_type' => $request->age_type,
        ]);
    }

    public function updateGroup(Group $group, object $request)
    {
        return $group->update([
            'name' => $request->name,
            'from' => $request->from,
            'to' => $request->to,
            'group_type_id' => $request->group_type_id,
            'teacher_id' => $request->teacher_id,
            'age_type' => $request->age_type,
        ]);
    }

    public function setGroupWithAllData(Group $group)
    {
        $this->groupWithAllData = $group->load('groupStudents.student', 'groupType', 'payments.student');
    }

    public function getGroupWithAllData()
    {
        return $this->groupWithAllData;
    }

    public function getGroupDaysNum()
    {
        return $this->groupWithAllData->groupType->days_num ?? 0;
    }

    public function getGroupStudentsCount()
    {
        return $this->groupWithAllData->groupStudents->count();
    }

    public function getGroupDaysCount()
    {
        return $this->groupWithAllData->groupDays->count();
    }

    public function getGruopsWithPaymentsByMonth($currentMonth)
    {
        $gorups = Group::with([
            'students.payments',
            'groupType',
            'payments' => function ($query) use ($currentMonth) {
                return $query->where('month', $currentMonth);
            }
        ])->get();
        
        return $gorups;
    }

    function appendAllStudentsPaidToGroups($gorups)
    {
        $gorups->map(function ($group) {
            $group->allStudentsPaid = $group->students->count() == $group->payments->where('paid', true)->count();
        });
    }
}