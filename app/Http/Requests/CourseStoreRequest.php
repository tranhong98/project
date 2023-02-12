<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
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
            'name' => 'required|unique:courses|max:100',
            'course_type_id' => 'required',
            'price' => 'required|min:0',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'tên khóa học',
            'course_type_id' => 'loại khóa học',
            'price' => 'giá khóa học',
        ];
    }
}
