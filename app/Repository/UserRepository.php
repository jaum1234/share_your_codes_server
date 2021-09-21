<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository 
{
    private $class;

    public function __construct()
    {
        $this->class = User::class;
    }

    public function add($request)
    {
        $senhaHash = bcrypt($request->password);

        User::create([
            'name' => $request->name,
            'nickname' =>$request->nickname,
            'email' => $request->email,
            'password' => $senhaHash
        ]);;
    }
}