<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VacinaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'descricao' => $this->faker->sentence(),
            'validade' => $this->faker->date(),
        ];
    }
}
