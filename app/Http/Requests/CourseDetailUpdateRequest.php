<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseDetailUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'course_id' => 'required',
            'name' => [
                'required',
                Rule::unique('course_details')->ignore($this->id)
            ],
            'content' => 'required',
            'description' => 'required',
            'video' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'course_id' => 'required',
            'name' => 'tên bài học',
            'content' => 'nội dung',
            'description' => 'miêu tả',
            'video' => 'video',
        ];
    }
}
