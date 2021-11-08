<?php

namespace Database\Seeders;

use App\Models\Projeto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projeto::factory()->count(10)->create();
    }
}
