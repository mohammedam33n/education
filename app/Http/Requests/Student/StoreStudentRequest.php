<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name" => ["required", "string"],
            "birthday" => ["nullable", "date"],
            "phone" => ["required", "string"],
            "qualification" => ["nullable", "string"],
        ];
    }
}
