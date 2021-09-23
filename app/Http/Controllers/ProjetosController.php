<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Service\BuscadorDeProjeto;
use Illuminate\Support\Facades\Auth;
use App\Repository\ProjetoRepository;
use Illuminate\Support\Facades\Validator;

class ProjetosController extends Controller
{
    private $repository;
    private $buscador;

    public function __construct(ProjetoRepository $repository, BuscadorDeProjeto $buscador)
    {
        $this->repository = $repository;
        $this->buscador = $buscador;
    }
    
    public function create()
    {
        return response()->view('editor.editor');
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

        return view(
            'editor.comunidade', 
            compact('projetos')
        );
    }

    public function store(Request $request)
    {   
        $validador = Validator::make($request->all(), [
            'nome' => 'required',
            'descricao' => 'required',
            'cor' => 'required',
            'codigo' => 'required'
        ], [
            'required' => 'Esse campo é obrigatório.'
        ]);

        if ($validador->fails()) {
            $response['success'] = false;
            $response['message'] = $validador->errors();
            return response()->json($response);
        }
        
        $dadosValidados = $validador->validated();

        $this->repository->add($dadosValidados);
          
        $response['success'] = true;
        $response['message'] = 'Projeto criado com sucesso!';
        
        return response()->json($response, 201); 
    }

    public function destroy(Request $request)
    {
        $this->repository->remove($request->id);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $projetos = $this->buscador->pesquisar($request->q);

        return view('editor.comunidade', compact('projetos'));
    }


}
