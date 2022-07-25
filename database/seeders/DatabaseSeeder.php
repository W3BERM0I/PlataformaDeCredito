<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Cliente::factory(2)->create();
        \App\Models\Emprestimo::factory(3)->create();
        \App\Models\Parcela::factory(6)->create();
    }
}
