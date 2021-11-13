<?php

namespace App\Http\Controllers\Users;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjetosUserController extends Controller
{
    public function index(Request $request)
    {
        $projetos = Projeto::where('user_id', Auth::id())
            ->orderBy('nome')
            ->paginate(4);

        return response()->view(
        'users.projetos', 
        compact('projetos')
        );   
    }
}
