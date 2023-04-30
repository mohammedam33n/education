<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Experience;
use App\Models\Group;
use App\Models\GroupDay;
use App\Models\GroupStudent;
use App\Models\GroupType;
use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentExam;
use App\Models\StudentLesson;
use App\Models\Subject;
use App\Models\syllabus;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::factory(2)->create()->each(function ($teacher) {
            Experience::factory(3)->create([
                'teacher_id' => $teacher->id
            ]);

            Group::factory(3)->create([
                'teacher_id' => $teacher->id,
                'group_type_id' => rand(1, 3)
            ])->each(function ($group) {

                Subject::factory(1)->create()->each(function ($subject) use ($group) {

                    Student::factory(10)->create()->each(function ($student) use ($subject, $group) {
                        $lesson = Lesson::factory(1)->create([
                            'subject_id' =>  $subject->id
                        ])->each(function ($lesson) use ($student, $group) {
                            StudentLesson::factory(1)->create([
                                'lesson_id' => $lesson->id,
                                'student_id' => $student->id,
                                'group_id' => $group->id
                            ]);
                            Exam::factory(1)->create([
                                'student_id' => $student->id,
                                'group_id' => $group->id,
                                'lesson_from' => $lesson->id,
                                'lesson_to' => $lesson->id
                            ]);
                        });

                        GroupStudent::factory(1)->create([
                            'student_id' => $student->id,
                            'group_id' => $group->id
                        ]);

                        Payment::factory(3)->create([
                            'student_id' => $student->id,
                            'group_id' => $group->id,
                        ]);
                    });
                });
            });
        });
    }
}