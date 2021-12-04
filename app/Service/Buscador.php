<?php 
namespace App\Service;

use App\Models\Projeto;
class Buscador
{
    private $model;

    public function __construct($model, $resource)
    {
        $this->model = $model; 
        $this->resource = $resource;
    }

    public function pesquisar(string $criterio)
    {
        $query = $criterio; 
        $projetos = $this->resource::collection(
            $this->model::where('nome', 'LIKE', '%' . $query . '%'
            )->paginate(4)); 
        //$projetos->appends(['q' => $query]);

        return $projetos;
    }
}