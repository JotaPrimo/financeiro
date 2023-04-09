<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DebitoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            'nome' => $this->faker->text(25),
            'valor' => $this->faker->randomFloat(10, 1.00, 2000.00),
            'user_id' => 1,
            'ano' => random_int(2023, 2029),
            'mes_id' => random_int(1, 12),
            'categoria_debito_id' => random_int(1, 5),
            'tipo_debito_id' => random_int(1, 3),
        ];
    }
}
