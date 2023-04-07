<?php

namespace Database\Seeders;

use App\Models\CategoriaProvento;
use App\Models\Debito;
use App\Models\Provento;
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
        $this->call([
            AnoSeeder::class,
            MesSeeder::class,
            CategoriaProventoSeeder::class,
            CategoriaDebitoSeeder::class,
            TipoDebitoSeeder::class,
            Provento::factory()->count(300)->make(),
            Debito::factory()->count(300)->make(),
        ]);


    }
}
