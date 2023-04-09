<?php

namespace Database\Seeders;

use App\Models\CategoriaProvento;
use App\Models\Debito;
use App\Models\Provento;
use Database\Factories\ProventoFactory;
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
            MesSeeder::class,
            CategoriaProventoSeeder::class,
            CategoriaDebitoSeeder::class,
            TipoDebitoSeeder::class,
            UserSeeer::class
        ]);

        Provento::factory()->count(300)->create();
        Debito::factory()->count(300)->create();


    }
}
