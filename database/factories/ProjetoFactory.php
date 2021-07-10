<?php

namespace Database\Factories;

use App\Models\Projeto;
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
        return [
            'nome' => 'teste-' . rand(1,100),
            'descricao' => 'descriçao-' . rand(1,100),
            'codigo' => 'codigo-' . rand(1,100),
            'cor' => '#000000', 
        ];
    }
}
