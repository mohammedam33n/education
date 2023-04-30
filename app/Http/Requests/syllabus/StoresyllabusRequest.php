<?php

namespace App\Http\Requests\syllabus;

use Illuminate\Foundation\Http\FormRequest;

class StoresyllabusRequest extends FormRequest
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
            'student_id' => 'required',
            'new_lesson' => 'required',
            'old_lesson' => 'required',
            'is_reverse' => 'required',
        ];
    }
}