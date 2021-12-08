<?php

namespace App\Http\Controllers\Users;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjetoResource;
use App\Service\ResponseOutput\ResponseOutput;
use Illuminate\Support\Facades\Auth;

class ProjetosUserController extends Controller
{
    public function index(Request $request, int $id)
    {
        $projetos = ProjetoResource::collection(Projeto::where('user_id', $id)->paginate($request->limit));

        return (new ResponseOutput(
            true,
            ['projetos' => $projetos],
            200,
            '',
            $projetos->total()
        ))->jsonOutput();
    }
}
