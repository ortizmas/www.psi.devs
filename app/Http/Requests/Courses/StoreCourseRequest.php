<?php

namespace App\Http\Requests\Courses;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'name' => "required|min:3|max:50|unique:courses,name",
            'url' => 'required|unique:courses,url|max:255',
            'description' => 'max:1000',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'O campo categoria é obrigatório.',
            'url.required'  => 'A url do post é obrigatório.',
            'url.unique' => 'A url já está sendo utilizado, altere manualmente.'
        ];
    }
}
