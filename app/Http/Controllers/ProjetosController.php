<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Service\BuscadorDeProjeto;
use App\Service\RemovedorDeProjeto;
use App\Repository\ProjetoRepository;
use App\Http\Requests\CodigoFormRequest;

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
        return view('editor.editor');
    }

    
    public function show(Request $request) 
    {
        $projeto = Projeto::find($request->id); 

        return view(
            'editor.pagina-projeto', 
            compact('projeto')
        );
    }

   
    public function index(Request $request)
    {
        $projetos = Projeto::query()
            ->orderBy('name')
            ->paginate(4);
        
        return $projetos;

        return view(
            'editor.comunidade', 
            compact('projetos')
        );
    }

    public function store(CodigoFormRequest $request)
    {   
        $this->repository->add($request);

        return redirect()->back();
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
