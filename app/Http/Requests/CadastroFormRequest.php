<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroFormRequest extends FormRequest
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
            'email' => 'required|unique:users|email',
            'nickname' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Esse campo é obrigatório',
            'nickname.required' => 'Esse campo é obrigatório',
            'password.required' => 'Esse campo é obrigatório',
            'email.required' => 'Esse campo é obrigatótio',

            'nickname.unique' => 'Esse nome de usuário já esta cadastrado',
            'email.unique' => 'Esse E-mail já foi cadastrado',

            'password.min' => 'A senha precisa ter no mínimo 8 caracteres',

            'password.confirmed' => 'As senhas nao correspodem',

            'email.email' => 'E-mail inválido'
        ];
    }
}
