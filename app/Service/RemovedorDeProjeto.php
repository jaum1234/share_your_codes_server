<?php 
namespace App\Service;

use App\Models\Projeto;

class RemovedorDeProjeto 
{
    public function removerProjeto(int $id)
    {
        $qtdRecursos = Projeto::destroy($id);
        if ($qtdRecursos === 0) {
            return redirect()->back(204);
        }
    }
}