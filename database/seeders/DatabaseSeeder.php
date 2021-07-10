<?php

namespace Database\Seeders;

use App\Models\Projeto;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Projeto::factory()
            ->count(50)
            ->create();
    }
}
