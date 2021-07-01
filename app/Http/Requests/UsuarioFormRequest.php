<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioFormRequest extends FormRequest
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
            'name' => 'required',
            'nickname' => [
                'required', Rule::unique('users', 'nickname')->ignore($this->user()->id)
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Esse campo é obrigatório',
            'nickname.required' => 'Esse campo é obrigatório',

            'nickname.unique' => 'Esse nome de usuario já existe'
        ];
    }
}
