<?php

namespace Database\Seeders;

use App\Models\CategoriaDebito;
use Illuminate\Database\Seeder;

class CategoriaDebitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'Comida',
            'Uber',
            'Lazer',
            'Educação',
            'Contas de Casa',
        ];

        foreach ($categorias as $categoria) {
            CategoriaDebito::create([
                'nome' => $categoria
            ]);
        }
    }
}
