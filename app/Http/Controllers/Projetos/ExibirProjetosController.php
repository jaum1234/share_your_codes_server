<?php

namespace App\Http\Controllers\Projetos;

use App\Http\Controllers\BaseController;
use App\Models\Projeto;

use App\Service\Buscador;
use Illuminate\Http\Request;
use App\Http\Resources\ProjetoResource;
use Illuminate\Http\JsonResponse;

class ExibirProjetosController extends BaseController
{
    private Buscador $buscador;

    public function __construct()
    {
        parent::__construct();
        $this->buscador = new Buscador(Projeto::class, ProjetoResource::class);
    }

    public function index(Request $request): JsonResponse
    {
        $projetos = ProjetoResource::collection(Projeto::paginate($request->limit));
        
        return $this->responseOutput->set(
            true,
            ['total' => $projetos->total(), 'projetos' => $projetos],
            "Projetos listados."
        );
    }

    public function show(Request $request): JsonResponse
    {
        
        $projeto = ProjetoResource::collection(Projeto::where('id', $request->id)->get()); 
        
        return $this->responseOutput->set(
            true,
            ['projeto' => $projeto],
            "Projeto exibido."
        );
    }

    public function search(Request $request): JsonResponse
    {
        $projetos = $this->buscador->pesquisar($request->q);

        return $this->responseOutput->set(
            true,
            ['total' => $projetos->total() ,'projetos' => $projetos],
            "Projetos encontrados."
        );
    }
}
