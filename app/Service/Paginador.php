<?php 

namespace App\Service;


class Paginador
{
    public function paginar(string $fullClassName, string $criterio, int $perPage)
    {
        $items = $fullClassName::where()
            ->orderBy($criterio)
            ->paginate($perPage);
        
        return $items;
    }
}