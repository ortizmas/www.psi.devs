<?php

namespace App\Http\Requests\Trainees;

use Illuminate\Foundation\Http\FormRequest;

class StoreTraineeRequest extends FormRequest
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
            'slug' => "required|min:3|max:50|unique:trainees,slug",
            'email' => "required|min:3|max:50|unique:trainees,email",
            'gender' => "required",
            'marital_status' => "required",
            'description' => 'max:1000',
            'image' => 'image',
            'course_id' => "required",
            'period_id' => "required",
        ];
    }
}
