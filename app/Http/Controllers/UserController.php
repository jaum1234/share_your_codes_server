<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\EditorPerfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request) 
    {
        $user = Auth::user();

        return view('mobile.user', compact('user'));
    }

    public function editarPerfil(Request $request)
    { 
        if ($request->nomeUsuario === null || $request->nomeCompleto === null) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['Os campos não podem estar vazios.']);
        }

        $editorPerfil = new EditorPerfil();
        $validacao = $editorPerfil->alterarDados(
                $request->nomeCompleto, 
                $request->nomeUsuario, 
                $request->id
            );
        
            return redirect()->back();
    }
}
