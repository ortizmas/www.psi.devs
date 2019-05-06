<?php

namespace App\Http\Requests\Periods;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodRequest extends FormRequest
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
            'year' => 'required|max:255|unique:periods,year',
        ];
    }

    public function messages()
    {
        return [
            'year.required' => 'O campo ano é obrigatório.',
            'year.unique' => 'O ano já foi cadastrado'
        ];
    }
}
