<?php

namespace Database\Seeders;

use App\Models\CategoriaProvento;
use Illuminate\Database\Seeder;

class CategoriaProventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'Salario Mensal',
            'Aluguel',
            'Freela',
            'PIS',
            'Vale Alimentenção'
        ];

        foreach ($categorias as $categoria) {
            CategoriaProvento::create([
                'nome' => $categoria
            ]);
        }
    }
}
