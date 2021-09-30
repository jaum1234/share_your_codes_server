<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Service\BuscadorDeProjeto;
use Illuminate\Support\Facades\Auth;
use App\Repository\ProjetoRepository;
use App\Service\ProjetoService;
use Illuminate\Support\Facades\Validator;

class ProjetosController extends Controller
{
    private $projetoService;
    private $buscador;

    public function __construct(ProjetoService $service, BuscadorDeProjeto $buscador)
    {
        $this->projetoService = $service;
        $this->buscador = $buscador;
    }
    
    public function create()
    {
        return response()->view('pages.editor');
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

        return view(
            'editor.pagina-projeto', 
            compact('projeto')
        );
    }

   
    public function index(Request $request)
    {
        $projetos = Projeto::query()
            ->orderBy('nome')
            ->paginate(4);

        return response()->view(
            'pages.comunidade', 
            compact('projetos')
        );
    }

    public function store(Request $request)
    {   
        $validador = $this->projetoService->validar($request);

        if ($validador->fails()) {
            $response['success'] = false;
            $response['message'] = $validador->errors();
            return response()->json($response);
        }
        
        $dadosValidados = $validador->validated();

        $this->projetoService->criar($dadosValidados);
          
        $response['success'] = true;
        $response['message'] = 'Projeto criado com sucesso!';
        
        return response()->json($response, 201); 
    }

    public function destroy(int $id)
    {
        Projeto::destroy($id);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $projetos = $this->buscador->pesquisar($request->q);

        return response()->view('pages.comunidade', compact('projetos'));
    }


}
