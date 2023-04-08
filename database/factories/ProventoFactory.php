<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $anos = [
            1, 2, 3, 4, 5, 6, 7, 8
        ];

        $meses = [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12
        ];

        return [
            'nome' => $this->faker->name,
            'valor' => $this->faker->randomFloat(10, 1.00, 12000.00),
            'user_id' => 1,
            'ano_id' => random_int(1, 8),
            'mes_id' => random_int(1, 12),
            'categoria_provento_id' => random_int(1, 4),
        ];
    }
}
