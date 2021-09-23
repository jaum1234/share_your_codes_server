<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Projeto;
use Illuminate\Support\Facades\Auth;

class ProjetoRepository 
{
    private $class;

    public function __construct()
    {
        $this->class = Projeto::class;
    }

    public function add($request)
    {
        $user = User::find(Auth::id());

        $projeto = $user->projetos()->create($request);

        return $projeto;
    }

    public function remove($id)
    {
        $qtdRecursos = $this->class::destroy($id);
        return $qtdRecursos;
    }   
}