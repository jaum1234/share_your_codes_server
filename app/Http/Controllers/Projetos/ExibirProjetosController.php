<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;

use App\Service\Buscador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjetoCollection;
use App\Http\Resources\ProjetoResource;
use App\Service\ResponseOutput\ResponseOutput;
use Illuminate\Http\JsonResponse;

class ExibirProjetosController extends Controller
{
    private Buscador $buscador;

    public function __construct()
    {
        $this->buscador = new Buscador(Projeto::class, ProjetoResource::class);
    }

    public function index(Request $request): JsonResponse
    {
        $projetos = ProjetoResource::collection(Projeto::paginate($request->limit));
        
        return (new ResponseOutput(
            true, 
            ['total' => $projetos->total(), 'projetos' => $projetos], 
            200, 
            ))->jsonOutput();
    }

    public function show(Request $request): JsonResponse
    {
        
        $projeto = ProjetoResource::collection(Projeto::where('id', $request->id)->get()); 

        return (new ResponseOutput(
            true, 
            ['projeto' => $projeto], 
            200, 
            ))->jsonOutput();
    }

    public function search(Request $request): JsonResponse
    {
        $projetos = $this->buscador->pesquisar($request->q);

        return (new ResponseOutput(
            true, 
            ['total' => $projetos->total(), 'projetos' => $projetos], 
            200, 
            ))->jsonOutput();
    }
}
