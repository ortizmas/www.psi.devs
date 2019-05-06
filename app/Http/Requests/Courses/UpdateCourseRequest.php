<?php

namespace App\Http\Requests\Courses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'name' => "required|min:3|max:50|unique:courses,name,". $this->course->id,
            'url' => 'required|max:255|unique:courses,url,'. $this->course->id,
            'description' => 'max:1000',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,gif,jpg,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'O campo categoria é obrigatório.',
            'slug.required'  => 'A url do post é obrigatório.',
            'slug.unique' => 'A url já está sendo utilizado, altere manualmente.'
        ];
    }
}
