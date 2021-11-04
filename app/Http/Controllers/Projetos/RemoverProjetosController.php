<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemoverProjetosController extends Controller
{
    public function destroy(int $id)
    {
        Projeto::destroy($id);

        return redirect()->back();
    }
}
