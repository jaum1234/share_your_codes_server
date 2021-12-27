<?php

namespace App\Http\Controllers\Projetos;

use App\Http\Controllers\BaseController;
use App\Models\Projeto;
use Illuminate\Http\JsonResponse;

class RemoverProjetosController extends BaseController
{
    public function destroy(int $id): JsonResponse
    {
        Projeto::destroy($id);
        return $this->responseOutput->set(true, [], "", 200);
    }
}
