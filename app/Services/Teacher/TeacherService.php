<?php

namespace App\Services\Teacher;

use App\Http\Traits\ImageTrait;
use App\Models\Teacher;

class TeacherService
{
    use ImageTrait;

    private $allDataAboutTeacher;


    public function getAllTeachers(array $columns = ['id', 'name'])
    {
        return Teacher::select($columns)->get();
    }


    public function setAllDataAboutTeacher(Teacher $teacher)
    {
        $this->allDataAboutTeacher = $teacher->load([
            'groupStudents',
            'groups.groupDays',
            'groups.groupType',
            'groups.students',
            'experiences'
        ]);
    }

    public function getTeacherExperiences()
    {
        return $this->allDataAboutTeacher->experiences;
    }

    public function getCountOfGroups()
    {
        return $this->allDataAboutTeacher->groups->count();
    }

    public function getCountOfStudents()
    {
        return $this->allDataAboutTeacher->groupStudents->count();
    }

    public function getAllTeacherGroups()
    {
        return $this->allDataAboutTeacher->groups;
    }

    public function createTeacher(object $request)
    {
        $fileName = $this->uploadImage(imageObject: $request->file('avatar'), path: Teacher::AVATARS_PATH);


        return Teacher::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
            'avatar' => $fileName,
        ]);
    }

    public function updateTeacher(Teacher $teacher, object $request): bool
    {
        $fileName = $teacher->getRawOriginal('avatar');

        if ($request->file('avatar')) {
            $this->deleteImage(path: $teacher->getAvatarPath());

            $fileName = $this->uploadImage(
                imageObject: $request->file('avatar'),
                path: Teacher::AVATARS_PATH
            );
        }

        return $teacher->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
            'avatar' => $fileName,
        ]);
    }

    public function deleteTeacher(Teacher $teacher): ?bool
    {
        $this->deleteImage(path: $teacher->getAvatarPath());

        return $teacher->delete();
    }
}
