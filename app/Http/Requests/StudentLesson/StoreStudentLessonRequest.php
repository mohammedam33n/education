<?php

namespace App\Http\Requests\StudentLesson;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "group_id" => 'required',
            "lesson_id" => "required",
            "student_id" => "required",
            "max_chapters" => "required",
            "chapters_count" => "required"
        ];
    }
}