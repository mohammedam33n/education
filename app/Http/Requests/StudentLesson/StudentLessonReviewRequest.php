<?php

namespace App\Http\Requests\StudentLesson;

use Illuminate\Foundation\Http\FormRequest;

class StudentLessonReviewRequest extends FormRequest
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

    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array<string, mixed>
    //  */
    // public function rules()
    // {
    //     return [
    //         // "group_id" => 'required|exists:groupes,id',
    //         // "lesson_id" => "required|exists:lessons,id",
    //         // "student_id" => "required|exists:students,id",
    //         // "max_chapters" => "required",
    //         // "chapters_count" => "required"



    //         "group_id"   => 'required|exists:groupes,id',
    //         "lesson_id"  => "required|exists:lessons,id",
    //         "student_id" => "required|exists:students,id",
    //         "finished"   => "required|boolean",
    //     ];
    // }



        /**
     * @return string[]
     * #[ArrayShape(['name' => "string"])]
     */
    protected function onCreate(): array
    {
        return [
            'name_ar'      => 'required|string|min:3',
            'name_en'      => 'required|string|min:3',
            'image'        => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ];
    }

    /**
     * @return string[]
     * #[ArrayShape(['name' => "string"])]
     */
    protected function onUpdate(): array
    {
        return [
            'name_ar'      => 'required|string|min:3',
            'name_en'      => 'required|string|min:3',
            'image'        => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ];
    }

    protected function onDelete(): array
    {
        return [
            'id' => 'required|exists:categories,id'
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {


        dd($this->request->all());

        switch ($this->method()) {
            case request()->isMethod('POST'):
                return $this->onCreate();
                break;

            case request()->isMethod('PUT'):
                return $this->onUpdate();
                break;

            case request()->isMethod('DELETE'):
                return $this->onDelete();
                break;

            default:
        }
    }
}


// group_id: group_id,
// lesson_id: lesson_id,
// student_id: student_id,
// finished: true,
// chapters_count: chapters_count,
// last_page_finished: last_page_finished,


// group_id: group_id,
// lesson_id: lesson_id,
// student_id: student_id,
// finished: false,
