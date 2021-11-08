<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Projeto;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjetoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Projeto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::firstOrCreate(
            [
                'nickname' => 'admin'
            ],
            [
                'name' => 'Joao Vitor de Souza Coura',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345')
            ]
        );

        return [
            'nome' => 'nome' . Str::random(10),
            'descricao' => 'descricao' . Str::random(20),
            'codigo' => Str::random(100),
            'cor' => '#000000',
            'user_id' => $user->id
        ];
    }
}
