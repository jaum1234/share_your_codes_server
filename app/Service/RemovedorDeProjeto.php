<?php 
namespace App\Service;

use App\Models\Projeto;

class RemovedorDeProjeto 
{
    public function removerProjeto(int $id)
    {
        Projeto::destroy($id);
    }
}