<?php

namespace App\Http\Requests\Inscriptions;

use Illuminate\Foundation\Http\FormRequest;
class InscriptionRequest extends FormRequest
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
        //dd('test validate');
        switch($this->method()) {
            case "GET":
            case "DELETE": {
                return [];
            }
            case "POST": // CRIAÇÃO DE UM NOVO REGISTRO
                $rules = [];
                $rules = [
                    'name' => 'required',
                    'cep' => 'required',
                    'email' => 'email|max:200|required',
                    'cpf' => 'required|cpf|max:14',
                    'phone' => 'required'
                ];

                return $rules;
                break;
            case "PUT": // ATUALIZAÇÃO DE UM REGISTRO EXISTENTE
                return [
                    'name' => 'required',
                    'cep' => 'required',
                    'email' => 'email|max:200|unique:donations,email,'.$this->id,
                    'cpf' => 'required|cpf|max:15',
                    'phone' => 'required'
                ];
                break;
            case 'PATCH': {
                return [];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'O Nome é obrigatório',
            'cep.required' => 'O CEP é obrigatório',
            'phone.required' => 'O Telefone é obrigatório',
            'email.email' => 'Informe um e-mail válido',
            'cpf.required' => 'O CPF é obrigatório'
        ];
    }
}
