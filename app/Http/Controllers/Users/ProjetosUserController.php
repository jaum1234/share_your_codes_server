<?php

namespace App\Http\Controllers\Users;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjetoResource;
use Illuminate\Support\Facades\Auth;

class ProjetosUserController extends Controller
{
    public function index(Request $request, int $id)
    {
        $projetos = ProjetoResource::collection(Projeto::where('user_id', $id)->paginate($request->limit));

        return response()->json([
            'success' => true,
            'total' => $projetos->total(),
            'projetos' => $projetos
        ]);
    }
}
