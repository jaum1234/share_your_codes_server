<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodigoFormRequest;
use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Service\CriadorDeProjeto;
use App\Service\BuscadorDeProjeto;
use App\Service\RemovedorDeProjeto;

class EditorDeCodigoController extends Controller
{
    /**
     *  Exibe o formulario de criaçao
     * dos projetos
     */
    public function create()
    {
        return view('editor.editor');
    }

    /**
     *  Exibe a pagina de cada
     * projeto
     */
    public function show(Request $request) 
    {
        $projeto = Projeto::find($request->id); 

        return view(
            'editor.pagina-projeto', 
            compact('projeto')
        );
    }

    /**
     *  Exibe a pagina da comunidade onde sao 
     * exibidos todos os projetos salvos
     */
    public function index()
    {
        $projetos = Projeto::query()
            ->orderBy('nome')
            ->paginate(4);

        return view(
            'editor.comunidade', 
            compact('projetos')
        );
    }

    /**
     *  Salva um projeto
     */
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

    /**
     *  Exclui um projeto
     */
    public function destroy(Request $request, RemovedorDeProjeto $removedorDeProjeto)
    {
        $removedorDeProjeto->removerProjeto($request->id);

        return redirect()->back();
    }

    /**
     *  Realiza uma busca na
     * barra de pesquisa
     */
    public function pesquisar(Request $request)
    {
        $buscadorDeProjeto = new BuscadorDeProjeto();
        $projetos = $buscadorDeProjeto->pesquisarProjeto($request->criterio);
        $projetos->appends($request->all());

        return view('editor.comunidade', compact('projetos'));
    }

}
