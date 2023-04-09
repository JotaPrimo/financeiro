<?php

namespace Database\Seeders;

use App\Models\TipoDebito;
use Illuminate\Database\Seeder;

class TipoDebitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = ['Mensal', 'Esporádico', 'Anual'];

        foreach ($tipos as $tipo) {
            TipoDebito::create([
                'nome' => $tipo
            ]);
        }
    }
}
