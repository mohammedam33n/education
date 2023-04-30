<?php

namespace App\Services\Student;

use App\Models\Student;

class StudentService
{
    public function getAllStudent()
    {
        return  Student::get();
    }
}