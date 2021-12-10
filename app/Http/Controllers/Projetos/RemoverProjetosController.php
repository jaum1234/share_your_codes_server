<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;
use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\ResponseOutput;

class RemoverProjetosController extends Controller
{
    public function destroy(int $id)
    {
        Projeto::destroy($id);
        return (new ResponseOutput(
            true,
            [],
            200,
        ))->jsonOutput();
    }
}
