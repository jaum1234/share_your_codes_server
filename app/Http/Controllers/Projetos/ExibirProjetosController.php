<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;
use App\Service\Buscador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExibirProjetosController extends Controller
{
    public function __construct()
    {
        $this->buscador = new Buscador(Projeto::class);
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

    public function search(Request $request)
    {
        $projetos = $this->buscador->pesquisar($request->q);

        return response()->view('pages.comunidade', compact('projetos'));
    }
}
