<?php 
namespace App\Service\Validadores;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjetosValidador
{
    public function validar(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'nome' => 'required',
            'descricao' => 'required',
            'cor' => 'required',
            'codigo' => 'required'
        ], [
            'required' => 'Esse campo é obrigatório.'
        ]);

        return $validador;
    }
}