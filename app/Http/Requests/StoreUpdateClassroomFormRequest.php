<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClassroomFormRequest extends FormRequest
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

        switch ($this->getMethod()) {
            case "POST":
                $rules = [
                        "name" => "required|min:3|max:191",
                        "slug" => "required|min:3|max:191|unique:classrooms,slug"
                    ];
                break;
            
            case "PUT":
                $rules = [
                        "name" => "required|min:3|max:191|unique:classrooms,name,{$this->classroom}",
                        "slug" => "required|min:3|max:191|unique:classrooms,slug,{$this->classroom}"
                    ];
                break;
        }

        return $rules;
    }
}
