<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class StorePage extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:pages,slug|max:255',
            'description' => 'nullable|max:300',
            'content' => 'nullable',
            'external_url' => 'nullable|url',
            'section_id' => 'required|integer',
        ];
    }
}
