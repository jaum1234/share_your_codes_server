<?php 

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditorPerfil 
{
    public function validarDados(string $nome, string $nick, int $id)
    {
        if (User::where('nickname', $nick)->exists()) {
            User::where('id', $id)
            ->update([
                'name' => $nome,
            ]);
            
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['Esse nome de usuário já existe.']); ;
        }
        return true;
    }

    public function alterarDados(string $nome,string $nick, int $id)
    {
        $validar = $this->validarDados($nome, $nick, $id);
            if ($validar === true) {
                User::where('id', $id)
                ->update([
                    'name' => $nome,
                    'nickname' => $nick
            ]);

            return redirect()->back();

        }

        return redirect()->back();
    }
}