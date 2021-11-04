<?php

namespace App\Http\Requests;

use App\Rules\VerificarHashing;
use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email' => 'required|exists:users|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            
            'email.required' => 'Esse campo é obrigatorio',
            'email.email' => 'O E-mail não é válido',
            'password.required' => 'Esse campo é obrigatório',
            'email.exists' => 'O email não esta cadastrado'

        ]; 
    }
}
