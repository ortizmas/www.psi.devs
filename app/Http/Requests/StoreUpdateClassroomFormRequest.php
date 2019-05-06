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
                        "name" => "required|min:3|max:50|unique:classrooms,name"
                    ];
                break;
            
            case "PUT":
                $rules = [
                        "name" => "required|min:3|max:50|unique:classrooms,name,{$this->classroom}"
                    ];
                break;
        }

        return $rules;
    }
}
