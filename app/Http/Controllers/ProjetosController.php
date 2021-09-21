<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodigoFormRequest;
use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Service\CriadorDeProjeto;
use App\Service\BuscadorDeProjeto;
use App\Service\RemovedorDeProjeto;

class ProjetosController extends Controller
{
    
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
            ->orderBy('nome')
            ->paginate(4);

        return view(
            'editor.comunidade', 
            compact('projetos')
        );
    }

    public function store(CodigoFormRequest $request, CriadorDeProjeto $criadorDeProjeto)
    {   
        $nome = $request->nome;
        $descricao = $request->descricao;
        $codigo = $request->codigo;
        $cor = $request->cor; 


            $criadorDeProjeto->criarProjeto(
                $nome,
                $descricao,
                $codigo,
                $cor,
            );

                return redirect()->back();
    }

    public function destroy(Request $request, RemovedorDeProjeto $removedorDeProjeto)
    {
        $removedorDeProjeto->removerProjeto($request->id);

        return redirect()->back();
    }

    public function pesquisar(Request $request)
    {
        $query = $request->q; 
        $projetos = Projeto::where('nome', 'LIKE', '%' . $query . '%')
            ->paginate(4);
        $projetos->appends(['q' => $query]);

        return view('editor.comunidade', compact('projetos'));

    }


}
