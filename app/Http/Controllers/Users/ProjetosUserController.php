<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjetoResource;
use App\Service\ResponseOutput\ResponseOutput;
use Illuminate\Support\Facades\Auth;

class ProjetosUserController extends BaseController
{
    public function index(Request $request, int $id)
    {
        $projetos = ProjetoResource::collection(Projeto::where('user_id', $id)->paginate($request->limit));

        return $this->responseOutput->set(
            true,
            ['total' => $projetos->total(), 'projetos' => $projetos],
            "Projetos do usuário listados."
        );
    }
}
