<?php

namespace Tests\Traits;

use App\Models\Teacher;
use Illuminate\Http\UploadedFile;

Trait TestTeacherTrait
{
    private function generateRandomTeacher(int $count = 1)
    {
        if($count == 1)
        {
            return Teacher::factory()->create();
        }
        return Teacher::factory($count)->create();
    }

    private function generateRandomTeacherData()
    {
        return [
            'name'          => fake()->name,
            'birthday'      => fake()->date,
            'phone'         => fake()->phoneNumber,
            'avatar'        => UploadedFile::fake()->image('avatar.jpg'),
            'qualification' => fake()->text
        ];
    }
}