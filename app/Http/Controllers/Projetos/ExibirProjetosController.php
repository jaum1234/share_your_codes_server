<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;

use App\Service\Buscador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjetoCollection;
use App\Http\Resources\ProjetoResource;

class ExibirProjetosController extends Controller
{
    public function __construct()
    {
        $this->buscador = new Buscador(Projeto::class, ProjetoResource::class);
    }

    public function index(Request $request)
    {
        $projetos = ProjetoResource::collection(Projeto::paginate($request->limit));
        
        return response()->json([
            'success' => true,
            'total' => $projetos->total(),
            'projetos' => $projetos
        ]);
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

        return response()->json([
            'success' => true,
            'projeto' => $projeto
        ]);
    }

    public function search(Request $request)
    {
        $projetos = $this->buscador->pesquisar($request->q);

        return response()->json([
            'success' => true,
            'total' => $projetos->total(),
            'projetos' => $projetos
        ]);
    }
}
