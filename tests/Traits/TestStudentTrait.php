<?php

namespace Tests\Traits;

use App\Models\Student;
use Illuminate\Http\UploadedFile;

Trait TestStudentTrait
{
    private function generateRandomStudent($count = 1)
    {
        if ($count == 1) {
            return Student::factory()->create();
        }
        return Student::factory($count)->create();
    }

    private function generateRandomStudentData()
    {
        return [
            'name' => fake()->name,
            'birthday' => fake()->date(),
            'phone' => fake()->phoneNumber,
            'qualification' => fake()->text(),
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ];
    }
}