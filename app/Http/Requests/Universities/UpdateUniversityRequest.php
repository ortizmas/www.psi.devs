<?php

namespace App\Http\Requests\Universities;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUniversityRequest extends FormRequest
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
            'initials' => 'required|unique:universities,initials,' . $this->university->id,
            'title' => 'required|unique:universities,title,' . $this->university->id,
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'initials.required' => 'O campo sigla é obrigatorio',
            'initials.unique' => 'A siglas já existe',
            'title.required' => 'O titulo é obrigatorio',
            'title.unique' => 'Esta universidade já existe',
            'description.required' => 'A descrição é obrigatorio',
        ];
    }
}
