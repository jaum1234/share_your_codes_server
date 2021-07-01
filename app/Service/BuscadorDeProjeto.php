<?php 
namespace App\Service;

use App\Models\Projeto;
use Illuminate\Http\Request;

class BuscadorDeProjeto
{
    public function pesquisarProjeto( string $criterio)
    {
        $projetos = Projeto::query()
            ->where('nome', 'LIKE', '%' . $criterio . '%')
            ->paginate(4);
        
        return $projetos;
    }
}