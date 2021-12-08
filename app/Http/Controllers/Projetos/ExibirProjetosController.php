<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;

use App\Service\Buscador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjetoCollection;
use App\Http\Resources\ProjetoResource;
use App\Service\ResponseOutput\ResponseOutput;

class ExibirProjetosController extends Controller
{
    public function __construct()
    {
        $this->buscador = new Buscador(Projeto::class, ProjetoResource::class);
    }

    public function index(Request $request)
    {
        $projetos = ProjetoResource::collection(Projeto::paginate($request->limit));
        
        return (new ResponseOutput(
            true, 
            ['total' => $projetos->total(), 'projetos' => $projetos], 
            200, 
            ))->jsonOutput();
    }

    public function show(Request $request) 
    {
        
        $projeto = Projeto::find($request->id); 

        return (new ResponseOutput(
            true, 
            ['projeto' => $projeto], 
            200, 
            ))->jsonOutput();
    }

    public function search(Request $request)
    {
        $projetos = $this->buscador->pesquisar($request->q);

        return (new ResponseOutput(
            true, 
            ['total' => $projetos->total(), 'projetos' => $projetos], 
            200, 
            ))->jsonOutput();
    }
}
