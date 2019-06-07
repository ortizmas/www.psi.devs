<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'slug' => 'required|unique:posts,slug|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'max:1000',
            'content' => 'required',
            'external_url' => 'nullable',
            'category_id' => 'required|integer',
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
