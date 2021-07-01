<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodigoFormRequest extends FormRequest
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
            'codigo' => 'required|',
            'nome' => 'required',
            'descricao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'Esse campo é obrigatório',
            'nome.required' => 'Esse campo é obrigatório',
            'descricao.required' => 'Esse campo é obrigatório',
        ];
    }
}
