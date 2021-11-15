<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;
use App\Http\Controllers\Controller;

class RemoverProjetosController extends Controller
{
    public function destroy(int $id)
    {
        $projeto = Projeto::destroy($id);
        return response()->json([
            'success' => true,
            'projeto' => $projeto,
            'msg' => 'Projeto ' . $id . ' excluido!'
        ]);
    }
}
