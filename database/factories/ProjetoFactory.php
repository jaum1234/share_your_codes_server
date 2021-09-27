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
<<<<<<< HEAD
            'nome' => 'nome do projeto',
            'descricao' => 'descricao do projeto',
            'codigo' => 'codigo do projeto',
            'cor' => 'cor do projeto'
=======
            'nome' => 'teste-' . rand(1,100),
            'descricao' => 'descriçao-' . rand(1,100),
            'codigo' => 'codigo-' . rand(1,100),
            'cor' => '#000000', 
>>>>>>> 74623675326c79154dd712dbfc9b2623daf246c3
        ];
    }
}
