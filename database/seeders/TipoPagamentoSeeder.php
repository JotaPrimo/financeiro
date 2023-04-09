<?php

namespace Database\Seeders;

use App\Models\TipoPagamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TipoPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = ['Crédito', 'Débito', 'PIX', 'Em espécie', 'Vale Alimentação', 'Vale Refeição'];

        foreach ($tipos as $tipo) {
            TipoPagamento::create([
                'nome' => $tipo,
                'descricao' => Str::random(35)
            ]);
        }
    }
}
