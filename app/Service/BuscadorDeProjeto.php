<?php 
namespace App\Service;

use App\Models\Projeto;

class BuscadorDeProjeto
{
    public function pesquisarProjeto(string $criterio)
    {
        $projetos = Projeto::where('nome', 'LIKE', '%' . $criterio . '%')->get();

        return $projetos;
    }
}