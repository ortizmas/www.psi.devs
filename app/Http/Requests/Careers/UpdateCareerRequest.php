<?php

namespace App\Http\Requests\Careers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'required|max:255|unique:careers,slug,' . $this->career->id,
            'university_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'university_id.required' => 'O campo universidade é obrigatório.',
            'slug.required'  => 'A url do curso é obrigatório.',
            'slug.unique' => 'A url já está sendo utilizado, altere manualmente.'
        ];
    }
}
