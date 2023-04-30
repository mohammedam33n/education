<?php

namespace Tests\Traits;

use App\Models\Group;
use App\Models\GroupType;

Trait TestGroupTrait
{
    private function generateRandomGroup(int $count = 1)
    {
        $teacher = $this->generateRandomTeacher();
        $groupType = $this->generateRandomGroupType();
        
        if($count == 1)
        {
            return Group::factory()->create([
                'teacher_id' => $teacher->id,
                'group_type_id' => $groupType->id
            ]);
        }
        return Group::factory($count)->create([
            'teacher_id' => $teacher->id,
            'group_type_id' => $groupType->id
        ]);
    }

    private function generateRandomGroupData()
    {
        $teacher = $this->generateRandomTeacher();
        $groupType = $this->generateRandomGroupType();

        return [
            'name' => fake()->name,
            'from' => "10:00",
            'to' => "11:00",
            'age_type' => Group::GROUP_TYPES[rand(0, 1)],
            'teacher_id' => $teacher->id,
            'group_type_id' => $groupType->id
        ];
    }
}