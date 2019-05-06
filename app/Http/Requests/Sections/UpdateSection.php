<?php

namespace App\Http\Requests\Sections;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSection extends FormRequest
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
        //dd($this->section->id);
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|max:191|unique:sections,slug,' . $this->section->id,
            'enabled' => 'required|string',
        ];
    }
}
