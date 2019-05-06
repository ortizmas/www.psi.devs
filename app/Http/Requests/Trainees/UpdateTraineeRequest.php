<?php

namespace App\Http\Requests\Trainees;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTraineeRequest extends FormRequest
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
        //dd($this->trainee->id);
        return [
            'name' => 'required|string|max:255',
            'slug' => "required|min:3|max:50|unique:trainees,slug,{$this->trainee->id}",
            'email' => "required|min:3|max:50|unique:trainees,email,{$this->trainee->id}",
            'gender' => "required",
            'marital_status' => "required",
            'description' => 'max:1000',
            'image' => 'image',
            'course_id' => "required",
            'period_id' => "required",
        ];
    }
}
