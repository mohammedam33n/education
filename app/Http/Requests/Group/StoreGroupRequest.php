<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
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
            'name' => 'required|unique:groups,name',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i|after:from',
            'teacher_id' => 'required',
            'group_type_id' => 'required',
            'age_type' => 'required',

        ];
    }
}
