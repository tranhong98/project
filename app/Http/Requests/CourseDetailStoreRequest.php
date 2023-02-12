<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseDetailStoreRequest extends FormRequest
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
            'name' => 'required|unique:course_details',
            'content' => 'required',
            'description' => 'required',
            'video' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'tên bài học',
            'content' => 'nội dung',
            'description' => 'miêu tả',
            'video' => 'video',
        ];
    }
}
