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
            'email' => 'email|exists:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            
            'email.email' => 'O E-mail esta invalido',
            'password.required' => 'Senha incorreta',
            'email.exists' => 'O email nao esta cadastrado'

        ]; 
    }
}
