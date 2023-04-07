<?php

namespace Database\Seeders;

use App\Models\Ano;
use Illuminate\Database\Seeder;

class AnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anos = [
            2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030
        ];

        foreach ($anos as $ano) {
            Ano::create([
                'nome' => $ano
            ]);
        }
    }
}
