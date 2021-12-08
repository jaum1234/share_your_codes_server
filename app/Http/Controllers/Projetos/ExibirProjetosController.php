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
            [$projetos], 
            200, 
            '', 
            $projetos->total()
            ))->jsonOutput();
    }

    public function show(Request $request) 
    {
        try {
            $projeto = Projeto::find($request->id); 
            if (is_null($projeto)) {
                throw new \DomainException("Parece que a página que você procura não existe.");
            }
        } catch (\DomainException $e){
            return response()->view('errors.404', ['error' => $e->getMessage()]);
        }

        return (new ResponseOutput(
            true, 
            [$projeto], 
            200, 
            '',
            1
            ))->jsonOutput();
    }

    public function search(Request $request)
    {
        $projetos = $this->buscador->pesquisar($request->q);

        return (new ResponseOutput(
            true, 
            [$projetos], 
            200, 
            '',
            $projetos->total()
            ))->jsonOutput();
    }
}
