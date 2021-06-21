<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projeto;
use Jorenvh\Share\Share;
use Illuminate\Http\Request;
use App\Service\CriadorDeProjeto;
use App\Service\BuscadorDeProjeto;
use App\Service\RemovedorDeProjeto;
use Illuminate\Support\Facades\Auth;

class EditorDeCodigoController extends Controller
{

    /* Exibe o formulario de criaçao dos projetos */
    public function create()
    {
        return view('mobile.editor');

        
    }

    public function paginaDoProjeto(Request $request) 
    {
        $projeto = Projeto::find($request->id); 
        $url = $request->url(); 
        return view('mobile.pagina-projeto', compact('projeto'));
    }

    public function meusProjetos()
    {
            
            $projetos = Projeto::where('user_id', Auth::id())
            ->orderBy('nome')
            ->get();

        return view('mobile.meus-projetos', compact('projetos'));        
    }

    public function compartilhar(Request $request)
    {
        $projeto = Projeto::find($request->id);
        
        return view('editor.compartilhar');
    }

    public function comunidade()
    {
        $projetos = Projeto::query()
            ->orderBy('nome')
            ->get();

        return view('mobile.comunidade', compact('projetos'));
    }

    public function store(Request $request)
    {    
        if (isset($_POST['botao-salvar'])) {

            $criadorDeProjeto = new CriadorDeProjeto();
            $criadorDeProjeto->criarProjeto(
                $request->nome,
                $request->descricao,
                $request->editor,
                $request->cor,
            );

                return redirect()->back();
        } 
        
        return redirect('/editorDeCodigo');
    }

    public function destroy(Request $request)
    {
        $removedorDeProjeto = new RemovedorDeProjeto();
        $removedorDeProjeto->removerProjeto($request->id);

        return redirect()->back();
    }

    public function curtir(Request $request)
    {
        
        return redirect('/editorDeCodigo/meusProjetos');
    }

    public function pesquisar(Request $request)
    {
        $buscadorDeProjeto = new BuscadorDeProjeto();
        $projetos = $buscadorDeProjeto->pesquisarProjeto($request->criterio);

        return view('mobile.comunidade', compact('projetos'));
    }

    public function home()
    {
        return view('welcome.home');
    }

}
