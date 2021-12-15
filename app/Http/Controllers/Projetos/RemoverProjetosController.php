<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;
use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\ResponseOutput;
use Illuminate\Http\JsonResponse;

class RemoverProjetosController extends Controller
{
    public function destroy(int $id): JsonResponse
    {
        Projeto::destroy($id);
        return (new ResponseOutput(
            true,
            [],
            200,
        ))->jsonOutput();
    }
}
