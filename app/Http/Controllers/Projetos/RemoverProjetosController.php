<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;
use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\ResponseOutput;

class RemoverProjetosController extends Controller
{
    public function destroy(int $id)
    {
        $projeto = Projeto::destroy($id);
        return (new ResponseOutput(
            true,
            [$projeto],
            200,
            '',
            0
        ))->jsonOutput();
    }
}
