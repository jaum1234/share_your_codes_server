<?php 
namespace App\Service;

use App\Models\Projeto;

class BuscadorDeProjeto
{
    public function pesquisar(string $criterio)
    {
        $query = $criterio; 
        $projetos = Projeto::where('nome', 'LIKE', '%' . $query . '%')
            ->paginate(4);
        $projetos->appends(['q' => $query]);

        return $projetos;
    }
}